(function($) {
    var options = {
        crosshair: {
            mode: null, // one of null, "x", "y" or "xy",
            color: "rgba(170, 0, 0, 0.80)",
            lineWidth: 1
        }
    };

    function init(plot) {
        // position of crosshair in pixels
        var crosshair = { x: -1, y: -1, locked: false, highlighted: false };

        plot.setCrosshair = function setCrosshair(pos) {
            if (!pos) {
                crosshair.x = -1;
            } else {
                var o = plot.p2c(pos);
                crosshair.x = Math.max(0, Math.min(o.left, plot.width()));
                crosshair.y = Math.max(0, Math.min(o.top, plot.height()));
            }

            plot.triggerRedrawOverlay();
        };

        plot.clearCrosshair = plot.setCrosshair; // passes null for pos

        plot.lockCrosshair = function lockCrosshair(pos) {
            if (pos) {
                plot.setCrosshair(pos);
            }

            crosshair.locked = true;
        };

        plot.unlockCrosshair = function unlockCrosshair() {
            crosshair.locked = false;
            crosshair.rect = null;
        };

        function onMouseOut(e) {
            if (crosshair.locked) {
                return;
            }

            if (crosshair.x !== -1) {
                crosshair.x = -1;
                plot.triggerRedrawOverlay();
            }
        }

        function onMouseMove(e) {
            var offset = plot.offset();
            if (crosshair.locked) {
                var mouseX = Math.max(0, Math.min(e.pageX - offset.left, plot.width()));
                var mouseY = Math.max(0, Math.min(e.pageY - offset.top, plot.height()));

                if ((mouseX > crosshair.x - 4) && (mouseX < crosshair.x + 4) && (mouseY > crosshair.y - 4) && (mouseY < crosshair.y + 4)) {
                    if (!crosshair.highlighted) {
                        crosshair.highlighted = true;
                        plot.triggerRedrawOverlay();
                    }
                } else {
                    if (crosshair.highlighted) {
                        crosshair.highlighted = false;
                        plot.triggerRedrawOverlay();
                    }
                }
                return;
            }

            if (plot.getSelection && plot.getSelection()) {
                crosshair.x = -1; // hide the crosshair while selecting
                return;
            }

            crosshair.x = Math.max(0, Math.min(e.pageX - offset.left, plot.width()));
            crosshair.y = Math.max(0, Math.min(e.pageY - offset.top, plot.height()));
            plot.triggerRedrawOverlay();
        }

        plot.hooks.bindEvents.push(function(plot, eventHolder) {
            if (!plot.getOptions().crosshair.mode) {
                return;
            }

            eventHolder.mouseout(onMouseOut);
            eventHolder.mousemove(onMouseMove);
        });

        plot.hooks.drawOverlay.push(function(plot, ctx) {
            var c = plot.getOptions().crosshair;
            if (!c.mode) {
                return;
            }

            var plotOffset = plot.getPlotOffset();

            ctx.save();
            ctx.translate(plotOffset.left, plotOffset.top);

            if (crosshair.x !== -1) {
                var adj = plot.getOptions().crosshair.lineWidth % 2 ? 0.5 : 0;

                ctx.strokeStyle = c.color;
                ctx.lineWidth = c.lineWidth;
                ctx.lineJoin = "round";

                ctx.beginPath();
                if (c.mode.indexOf("x") !== -1) {
                    var drawX = Math.floor(crosshair.x) + adj;
                    ctx.moveTo(drawX, 0);
                    ctx.lineTo(drawX, plot.height());
                }
                if (c.mode.indexOf("y") !== -1) {
                    var drawY = Math.floor(crosshair.y) + adj;
                    ctx.moveTo(0, drawY);
                    ctx.lineTo(plot.width(), drawY);
                }
                if (crosshair.locked) {
                    if (crosshair.highlighted) ctx.fillStyle = 'orange';
                    else ctx.fillStyle = c.color;
                    ctx.fillRect(Math.floor(crosshair.x) + adj - 4, Math.floor(crosshair.y) + adj - 4, 8, 8);
                }
                ctx.stroke();
            }
            ctx.restore();
        });

        plot.hooks.shutdown.push(function(plot, eventHolder) {
            eventHolder.unbind("mouseout", onMouseOut);
            eventHolder.unbind("mousemove", onMouseMove);
        });
    }

    $.plot.plugins.push({
        init: init,
        options: options,
        name: 'crosshair',
        version: '1.0'
    });
})(jQuery);