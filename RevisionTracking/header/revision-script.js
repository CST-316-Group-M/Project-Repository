/*
  Christopher McDonald, Group M

  Credit goes to anonymous tree tutorial

  Code is entirely unchanged from where it was borrowed
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
  Little stub for testing
*/

	function File(name,date,size) {
	    this.name = name;
	    this.date = date;
	    this.size = size;
	}

	var dummyrepo = [
	new File("OfflineRepo/Folder 1/.","3/4/14 14:44",""),
	new File("OfflineRepo/Folder 1/File 1.doc","3/4/14 12:35","9034"),
	new File("OfflineRepo/Folder 1/File 1.doc/revision3-3-14.rev","3/3/14 18:13","8132"),
	new File("OfflineRepo/Folder 1/File 2.doc","3/17/14 15:55","3293"),
	new File("OfflineRepo/Folder 1/File 2.doc/revision3-14-14.rev","3/14/14 5:34","3066"),
	new File("OfflineRepo/Folder 1/File 2.doc/revision3-7-14.rev","3/7/14 6:43","1024"),
	new File("OfflineRepo/File 3.html","3/7/14 15:00","1135"),
	new File("OfflineRepo/File 3.html/revision2-28-14.rev","2/28/14 12:12","1076"),
	new File("OfflineRepo/File 3.html/revision2-26-14.rev","2/26/14 23:59","845"),
	new File("OfflineRepo/File 3.html/revision2-5-14.rev","2/5/14 1:53","433"),
	new File("OfflineRepo/File 4.txt","1/25/14 3:17","590"),
	new File("OfflineRepo/File 5.png","11/4/13 17:34","23546")
	];

/*
  Credit goes to Addy Osmani for his webkitdirectory tutorial (albeit very little)

  Uses the name fields from the html page to retrieve the file list object and create the tree
  if-blocks check if they are using something that is not Chrome/html5
  Process uses the specification of the file object created from the prompt
  nbsp needed for spacing

  Problems include: Poor sorting which does not put folders at the top, logic structure lengthy
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
      date,
      size,
      output = document.getElementById("fileOutput");

    output.innerHTML = "";
    files = dummyrepo;
    len = files.length;

    for(var i = 0; i < len; i++) {
      file = files[i];
      path = file.name.split("/");
      pathLen = path.length;
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
      date = file.date;
      size = file.size;
      if(size!="") {
          size = " | " + size;
          size += " b";
      }
      output.innerHTML += "<tr data-depth='" + (pathLen - 2) + "' class='collapse level" + (pathLen - 2) + "'><td>&nbsp<span class='" + mother + "'></span>&nbsp<span class='type-" + ext + "'>&nbsp&nbsp&nbsp&nbsp&nbsp" + path[pathLen - 1] + " | " + date + size + "</span></td></tr>";
    }
});
