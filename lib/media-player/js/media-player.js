
	    var mediaElements = document.querySelectorAll('video, audio');

	    for (var i = 0, total = mediaElements.length; i < total; i++) {

		    var features = ['playpause', 'current', 'progress', 'duration', 'volume', 'skipback', 'jumpforward', 'speed', 'fullscreen'];

		    new MediaElementPlayer(mediaElements[i], {
			    autoRewind: false,
			    features: features,
		    });
	    }
