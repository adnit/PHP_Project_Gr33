document.addEventListener(
  'DOMContentLoaded',
  function () {
    [].slice
      .call(document.querySelectorAll('[data-bss-tooltip]'))
      .map(function (e) {
        return new bootstrap.Tooltip(e);
      });
    var e = document.querySelectorAll('[data-bss-chart]');
    for (var t of e) t.chart = new Chart(t, JSON.parse(t.dataset.bssChart));
  },
  !1
);
document.getElementById('getinfo').classList.add('d-none');
const ombdAPI_KEY = 'af2beff5';
var doge =
  'https://imgix.gizmodo.com.au/content/uploads/sites/2/2021/05/10/237bm4bba4g61.png?ar=16%3A9&auto=format&fit=crop&q=80&w=1280&nrs=30';
function showForm() {
  var e = document.getElementById('infoOption').value;
  console.log(e),
    document.getElementById('getinfo').classList.remove('d-none'),
    1 == e && document.getElementById('getimdb').classList.remove('d-none'),
    0 == e
      ? document.getElementById('getimdb').classList.add('d-none')
      : console.log('nothing');
}
let imid = document.getElementById('imdbIDfield'),
  poster = document.getElementById('poster'),
  title = document.getElementById('title'),
  released = document.getElementById('released'),
  runtime = document.getElementById('runtime'),
  genre = document.getElementById('genre'),
  director = document.getElementById('director'),
  actors = document.getElementById('actors'),
  plot = document.getElementById('plot'),
  boxoffice = document.getElementById('boxoffice'),
  studio = document.getElementById('studio');
function resetForm() {
  document.getElementById('movieform').reset();
}
function removeFile() {
  (document.getElementById('file').value = ''), (poster.src = doge);
}
function onFileSelected(e) {
  var t = e.target.files[0],
    o = new FileReader();
  (o.onload = function (e) {
    poster.src = e.target.result;
    // console.log(poster.src);
    // document.getElementById('posterfield').value = poster.src;
  }),
    o.readAsDataURL(t);
}
function getMovieDetails() {
  var e = document.getElementById('movieID').value;
  '' != e &&
    (console.log(e),
    $.getJSON(
      'https://www.omdbapi.com/?',
      { apikey: 'af2beff5', i: e },
      (e) => {
        if ('True' != e.Response)
          throw (
            (document.getElementById('status').classList.add('btn-danger'),
            document.getElementById('statusIcon').classList.add('fa-times'),
            resetForm(),
            (poster.src = doge),
            alert('Ndodhi nje problem: ' + e.Error),
            e.Error)
          );
        document.getElementById('file').required = false;
        document.getElementById('status').classList.remove('btn-danger'),
          document.getElementById('status').classList.add('btn-success'),
          document.getElementById('statusIcon').classList.remove('fa-times'),
          document.getElementById('statusIcon').classList.add('fa-check'),
          (title.value = e.Title),
          (released.value = e.Year),
          (runtime.value = e.Runtime),
          (genre.value = e.Genre),
          (poster.src = e.Poster),
          (studio.value = e.Production),
          (boxoffice.value = e.BoxOffice),
          (director.value = e.Director),
          (actors.value = e.Actors),
          (plot.value = e.Plot),
          (imid.value = e.imdbID);
        document.getElementById('imdbIDrating').value = e.imdbRating;
        document.getElementById('posterfield').value = poster.src;
      }
    ));
}
!(function () {
  'use strict';
  var e = document.querySelector('.sidebar'),
    t = document.querySelectorAll('#sidebarToggle, #sidebarToggleTop');
  if (e) {
    e.querySelector('.collapse');
    var o = [].slice
      .call(document.querySelectorAll('.sidebar .collapse'))
      .map(function (e) {
        return new bootstrap.Collapse(e, { toggle: !1 });
      });
    for (var n of t)
      n.addEventListener('click', function (t) {
        if (
          (document.body.classList.toggle('sidebar-toggled'),
          e.classList.toggle('toggled'),
          e.classList.contains('toggled'))
        )
          for (var n of o) n.hide();
      });
    window.addEventListener('resize', function () {
      if (
        Math.max(
          document.documentElement.clientWidth || 0,
          window.innerWidth || 0
        ) < 768
      )
        for (var e of o) e.hide();
    });
  }
  var d = document.querySelector('body.fixed-nav .sidebar');
  d &&
    d.on('mousewheel DOMMouseScroll wheel', function (e) {
      if (
        Math.max(
          document.documentElement.clientWidth || 0,
          window.innerWidth || 0
        ) > 768
      ) {
        var t = e.originalEvent,
          o = t.wheelDelta || -t.detail;
        (this.scrollTop += 30 * (o < 0 ? 1 : -1)), e.preventDefault();
      }
    });
  var l = document.querySelector('.scroll-to-top');
  l &&
    window.addEventListener('scroll', function () {
      var e = window.pageYOffset;
      l.style.display = e > 100 ? 'block' : 'none';
    });
})();
