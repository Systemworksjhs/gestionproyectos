class loadVideo {
    constructor(identifier, config) {
        this.identifier = identifier;
        this.config = config;
        this.player = null;
    }

    onYouTubeIframeAPIReady() {
        const videoFrame = document.querySelector(this.identifier);
        const url = videoFrame.getAttribute('src');
        const id = url.substring(30, url.indexOf('?'));

        return new Promise((resolve, reject) => {
            this.player = new YT.Player(videoFrame, {
                width: this.config.sizeX,
                height: this.config.sizeY,
                videoId: id,
                events: {
                    'onReady': () => resolve(this.player),
                    'onError': (errorCode) => reject(errorCode)
                }
            });
        });
    }

    configurationVideo() {
        let url, id;

        if (document.querySelector(this.identifier).tagName === "IFRAME") {
            console.log(this.player);

            // setTimeout(() => {
            if (this.config.playVideo) { this.player.playVideo(); }
            if (this.config.playMute) { this.player.mute(); }
            // },1000);
        } else if (document.querySelector(this.identifier).tagName === "DIV") {
            url = document.querySelector(this.identifier).getAttribute('data-href');
            id = url.split("/");
            id = url[url.length - 2];
        }
    }
}



(function() {
    //API de Youtube
    //Creo el script del API de Youtube
    let youtubeAPI = document.createElement('script');
    youtubeAPI.src = "https://www.youtube.com/iframe_api";

    //Le indico que se carge antes de este script
    let scriptMultimediaManager = document.getElementById('videoScript');
    scriptMultimediaManager.parentNode.insertBefore(youtubeAPI, scriptMultimediaManager);

    //API de Facebook
    //Creo un div root
    let root = document.createElement('div');
    root.id = "fb-root";

    //Creo el script del API de Youtube
    let facebookAPI = document.createElement('script');
    facebookAPI.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2";

    //Le indico que se carge antes de este script
    document.body.insertBefore(root, document.body.childNodes[0]);
    document.body.insertBefore(facebookAPI, document.body.childNodes[1]);

    const configVideoMask = {
        sizeX: 600, //Ancho
        sizeY: 400, //Alto
        playVideo: true,
        playMute: true,
    }

    let videoMask = document.querySelector('.video-mask');
    videoMask.addEventListener('click', function() {
        let videoFrame = document.querySelector('.videoHome');

        videoMask.setAttribute('style', 'display: none');
        videoFrame.setAttribute('style', 'opacity: 1');

        const home = new loadVideo('.videoHome', configVideoMask);
        home.onYouTubeIframeAPIReady()
            .then(
                player => home.configurationVideo()
            ).catch(
                error => alert(`Error en la inicialización del video => ${error}`)
            );
    });
})();