/*
  Christopher McDonald, Group M

  Credit goes to Addy Osmani for his webkitdirectory tutorial
*/

window.onload = function() {
  var singular,
      files,
      len,
      fileArray,
      file,
      extension,
      path,
      pathLen,
      input = document.getElementById("fileURL"),
      output = document.getElementById("fileOutput");

  input.addEventListener("change", function(e) {
    output.innerHTML = "";
    files = e.target.files;
    len = files.length;
    fileArray = new Array(len);
    for(var i = 0; i < len; i++) {
      if(files[i].webkitRelativePath == null) {
        singular = true;
        fileArray[i] = files[i].name;
      }
      else {
        fileArray[i] = files[i].webkitRelativePath;
      }
    }
    fileArray.sort();

    for(var i = 0; i < len; i++) {
      file = fileArray[i];
      extension = file.split(".").pop();
      if(singular) {
        path = file;
        pathLen = 0;
      }
      else {
        path = file.split("/");
        pathLen = path.length;
      }
      if(extension == "") {
        extension = "folder";
        pathLen -= 1;
      }
      if(singular) {
        output.innerHTML += "<li class='type-" + extension + "' style='padding-left:20px; background-position: 0 0;'>" + path + "</li>";
      }
      else {
        output.innerHTML += "<li class='type-" + extension + "' style='padding-left:" + Math.ceil((pathLen * 20) - 20) + "px; background-position: " + Math.ceil((pathLen * 20) - 40) + " 0;'>" + path[pathLen - 1] + "</li>";
      }
    }
  }, false);
};
