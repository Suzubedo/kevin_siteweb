function(){
  var a="-webkit-", // vendor prefix for Chrome, Safari
      b='transform:rotate(1turn);', // the CSS for rotating 360deg
      c='transition:4s;'; // the CSS for making the rotation last 4 seconds
      
  document.head.innerHTML // adding a style tag to the <head>
     += '<style>body{' + a + b + a + c + b + c // the combined CSS in the style tag
     
     /* 
     This actually generates a string that looks like: 
     "<style>body{-webkit-transform:rotate(1turn);-webkit-transition:4s;transform:rotate(1turn);transition(4s);"
     Which obviously is lacking a closing tag and a closing bracket, but luckily browsers are smart enough to figure this out.
     It also only has vendor prefixes for WebKit. That's because it turns out Firefox and Opera work just fine without the prefixes here.
     */
}


