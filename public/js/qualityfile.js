var selectedfiles;
var selectedfile;
var files = [];
var fileIndex;
$(document).ready(function () {

    if (window.File && window.FileList && window.FileReader) {
        $("#filess").on("change", function (e) {

            var files = e.target.files; // Use the files directly from the event
    
            for (var i = 0; i < files.length; i++) {
                var selectedFile = files[i]; // Get the individual file
                console.log(selectedFile);
        
                var fileReader = new FileReader();
                fileReader.onload = (function (file) { // Pass the file into the closure
                    return function (e) {
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result +
                            "\" title=\"" + file.name + "\"/>" +
                            "<br/><span class=\"remove\" onclick=\"removeImage('" +
                            file.name + "')\">Remove image</span>" +
                            "</span>").insertAfter("#filess");
    
                        $(".remove").click(function () {
                            $(this).parent(".pip").remove();
                        });
                    };
                })(selectedFile); // Call the function with selectedFile
    
                fileReader.readAsDataURL(selectedFile); // Read the individual file
            }
        });
    } else {
        alert("Your browser doesn't support the File API");
    }
    
});

function removeImage(name) {
    selectedfiles = document.getElementById("filess").files;
    var final = [];
    $.each(selectedfiles, function (index, value) {
        if (value.name !== name) {
            console.log(value);
            final.push(value);
        }
    });
    console.log('List', final);
    document.getElementById("filess").files = new FileListItem(final);
}

function FileListItem(a) {
    a = [].slice.call(Array.isArray(a) ? a : arguments)
    for (var c, b = c = a.length, d = !0; b-- && d;) d = a[b] instanceof File
    if (!d) throw new TypeError("expected argument to FileList is File or array of File objects")
    for (b = (new ClipboardEvent("")).clipboardData || new DataTransfer; c--;) b.items.add(a[c])
    return b.files
}
