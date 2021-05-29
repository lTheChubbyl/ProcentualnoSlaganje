$(document).ready(function() 
{
	var supportedFlag = $.keyframe.isSupported();
	if ($('.result').children().length != 0)
	{
		$.keyframe.define({
		    name: 'slide',
		    '0%': 
		    {
		        'transform': 'translate(-50%, -50%) rotate(0deg)'
		    },
		    '100%': 
		    {
		        'transform': 'translate(-50%, -150%) rotate(500deg)'
		    }
		});
	}
});
