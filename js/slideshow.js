var counter = 1;
setInterval(function () {
  document.getElementById("btn" + counter).checked = true;
  counter++;
  let length = document.getElementsByClassName("slide").length;
  if (counter > length) {
    counter = 1;
  }
}, 5000);
