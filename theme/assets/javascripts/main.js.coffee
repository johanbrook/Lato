if navigator.userAgent.match /iPhone/i or navigator.userAgent.match /iPad/i	
	header_height = document.querySelector('[role="complementary"]').getBoundingClientRect().height
	scrollTo 0, header_height