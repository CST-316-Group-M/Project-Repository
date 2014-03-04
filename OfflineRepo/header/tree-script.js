/*
  Christopher McDonald, Group M

  Credit goes to anonymous tree tutorial
*/

window.onload = $(function() {
    $('#fileOutput').on('click', '.toggle', function () {
        //Gets all <tr>'s  of greater depth
        //below element in the table
        var findChildren = function (tr) {
            var depth = tr.data('depth');
            return tr.nextUntil($('tr').filter(function () {
                return $(this).data('depth') <= depth;
            }));
        };

        var el = $(this);
        var tr = el.closest('tr'); //Get <tr> parent of toggle button
        var children = findChildren(tr);

        //Remove already collapsed nodes from children so that we don't
        //make them visible. 
        //(Confused? Remove this code and close Item 2, close Item 1 
        //then open Item 1 again, then you will understand)
        var subnodes = children.filter('.expand');
        subnodes.each(function () {
            var subnode = $(this);
            var subnodeChildren = findChildren(subnode);
            children = children.not(subnodeChildren);
        });

        //Change icon and hide/show children
        if (tr.hasClass('collapse')) {
            tr.removeClass('collapse').addClass('expand');
            children.hide();
        } else {
            tr.removeClass('expand').addClass('collapse');
            children.show();
        }
        return children;
    });

/*
  Credit goes to Addy Osmani for his webkitdirectory tutorial
*/

  var singular,
      files,
      len,
      fileArray,
      file,
      path,
      pathLen,
      ext,
      nextFile,
      nextPath,
      nextPathLen,
      nextExt,
      mother,
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
      if(singular) {
        path = file;
        pathLen = 0;
      }
      else {
        path = file.split("/");
        pathLen = path.length;
      }
      ext = file.split(".").pop();
      if(ext == "") {
        ext = "folder";
        pathLen -= 1;
      }
      if(singular) {
        output.innerHTML += "<tr data-depth='0' class='type-" + ext + " collapse level0'><td><span class='child'></span>" + path + "</td></tr>";
      }
      else {
        if(i < (len - 1)) {
          nextFile = fileArray[i+1];
          nextPath = nextFile.split("/");
          nextPathLen = nextPath.length;
          nextExt = nextFile.split(".").pop();
          if(nextExt == "") {
            nextPathLen -= 1;
          }
          if(pathLen < nextPathLen) {
            mother = "toggle collapse";
          }
          else {
            mother = "child";
          }
        }
        else {
          mother = "child";
        }
        output.innerHTML += "<tr data-depth='" + (pathLen - 2) + "' class='collapse level" + (pathLen - 2) + "'><td>&nbsp<span class='" + mother + "'></span>&nbsp<span class='type-" + ext + "'>&nbsp&nbsp&nbsp&nbsp&nbsp" + path[pathLen - 1] + "</td></tr>";
      }
    }
  }, false);
});
