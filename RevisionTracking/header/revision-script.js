/*
  Christopher McDonald, Group M

  Credit goes to anonymous tree tutorial

  Code immediately below is entirely unchanged from where it was borrowed
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
  When a user clicks on the H icon at the end of a file, this executes.

  The first line hides all of the currently shown history data, to make it cleanly update.

  The second and third line acquire the file name in the id field.

  The last line searches and shows the history data that matches the id from the H icon.
*/

    $('#fileOutput').on('click', '.history', function () {
        $("[id^='revisionOutput']").children().each(function() {
            $(this).hide();
        });
        
        var el = $(this);
        var hist = el.attr("id");
        $("*[id^='" + hist + "']").each(function() {
            $(this).show();
        });
    });

/*
  Little stub for testing

  Creates file data with the specification of a file system, where FakeRepo is the folder that
  the repo is assigned to.

  Hopefully, it could be a smooth transition into real data if the file objects passed have the
  same accessors (name, date, size) so that the code to create the tree can remain unchanged.
*/

	function File(name,date,size) {
	    this.name = name;
	    this.date = date;
            this.size = size;
	}

	var dummyrepo = [
	 new File("FakeRepo/Folder 1/.","3/4/14 14:44","560"),
	 new File("FakeRepo/Folder 1/File 1.doc","3/4/14 12:35","256"),
         new File("FakeRepo/Folder 1/.File 1doc/.","3/4/14 12:35","202"),
         new File("FakeRepo/Folder 1/.File 1doc/File 1-1.doc","3/2/14 23:44","202"),
	 new File("FakeRepo/Folder 1/File 2.doc","3/17/14 15:55","102"),
	 new File("FakeRepo/File 3.html","3/7/14 15:00","68"),
	 new File("FakeRepo/File 4.txt","1/25/14 3:17","40"),
	 new File("FakeRepo/File 5.png","11/4/13 17:34","634"),
	 new File("FakeRepo/.File 5png/.","11/4/13 17:34","1325"),
	 new File("FakeRepo/.File 5png/File 5-1.png","10/30/13 10:45","780"),
	 new File("FakeRepo/.File 5png/File 5-2.png","10/23/13 19:14","545")
	];

/*
  Credit goes to Addy Osmani for his webkitdirectory tutorial (albeit very little)

  Carried over from the previous iteration (which showed files on the local file system) and
  changed to suit the differences (mainly the avoidance of webkitdirectory).

  The top level code filters out files with periods at the start of them, as that indicates
  items which are used purely for the revision history portion.

  Real files and folders are put into the tree with their id associated with them. The large
  nextFile block is to determine whether the folder has items in it or not.

  The last chunk filters out the folders which contain the old data, and only works with the files
  which are inside of them. It builds the id to match the real file based on a naming convention.
*/

  var files,
      len,
      file,
      path,
      pathLen,
      ext,
      nextFile,
      nextPath,
      nextPathLen,
      nextExt,
      mother,
      indent,
      fileName,
      output = document.getElementById("fileOutput");
      output2 = document.getElementById("revisionOutput");

    output.innerHTML = "";
    output2.innerHTML = "";
    files = dummyrepo;
    len = files.length;

    for(var i = 0; i < len; i++) {
      file = files[i];
      path = file.name.split("/");
      pathLen = path.length;
      if(path[pathLen - 2].charAt(0) != '.') {
        ext = file.name.split(".").pop();
        if(ext == "") {
          ext = "folder";
          pathLen -= 1;
        }
        if(i < (len - 1)) {
          nextFile = files[i+1];
          nextPath = nextFile.name.split("/");
          nextPathLen = nextPath.length;
          nextExt = nextFile.name.split(".").pop();
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
        indent = ((pathLen - 2) * 15);
        fileName = path[pathLen - 1];
        fileName = fileName.substr(0,fileName.lastIndexOf("."));
        output.innerHTML += "<tr data-depth='" + (pathLen - 2) + "' class='collapse level'><td style='padding-left:" + indent + ";'>&nbsp<span class='" + mother + "'></span>&nbsp<span class='type-" + ext + "'>&nbsp&nbsp&nbsp&nbsp&nbsp" + path[pathLen - 1] + "</span></td><td style='width:22px'><span class='history' id='" + fileName + ext + "'></span></td></tr>";
        output2.innerHTML += "<tr id='" + fileName + ext + "' style='display: none;'><td>" + path[pathLen - 1] + "</td><td>" + file.date + "</td><td>" + file.size + " kb</td></tr>";
      }
      else {
        if(path[pathLen - 1].charAt(0) != '.') {
          fileName = path[pathLen - 1].split(".").shift();
          fileName = fileName.substr(0,fileName.lastIndexOf("-"));
          output2.innerHTML += "<tr id='" + fileName + ext + "' style='display: none;'><td>" + path[pathLen - 1] + "</td><td>" + file.date + "</td><td>" + file.size + " kb</td></tr>";
        }
      }
    }
});
