/*

    typewriter 

*/

// holdover from materiaabierta
// should make this a standalone function

var newsContent = document.getElementById('news-content');
var newsIdx = 0;

renderNews(newsIdx++);

setInterval(function() {
  return (function(idx) {
    renderNews(idx % newsItems.length);
  })(newsIdx++);
}, 10000);

function renderNews(idx) {
  while(newsContent.firstChild)
    newsContent.removeChild(newsContent.firstChild);

  var aTag = document.createElement('a');
  // aTag.setAttribute('href', newsItems[idx].url);
  aTag.setAttribute('href', '#');
  newsContent.appendChild(aTag);
  var i = 0;
  var txt = newsItems[idx].content;
  var speed = 40;

  function typeWriter() {
    if (i < txt.length) {
      aTag.innerHTML += txt.charAt(i);
      i++;
      setTimeout(typeWriter, speed);
    }
  }

  typeWriter();

  var d = new Date();
  document.querySelector('.child.news .meta .modified').innerHTML =
    "Modified " + d.getFullYear() +
    '-' + ("" + (d.getMonth() + 1)).padStart(2, 0) +
    '-' + ("" + d.getDate()).padStart(2, 0) +
    ' ' + ("" + d.getHours()).padStart(2, 0) +
    ':' + ("" + d.getMinutes()).padStart(2, 0) +
    ':' + ("" + d.getSeconds()).padStart(2, 0);

  document.querySelector('.child.news .meta .filename').innerHTML = txt.length + ' Characters';
}
