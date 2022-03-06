window.Utils = class Utils {

    static confirm(callback){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                callback();
            }
        })
    }
}
String.prototype.trim = function (chars = " "){
    if (chars === undefined)
        chars = "\s";
    else
        chars.replace('\\','\\\\');

    return this.replace(new RegExp(`(^[${chars}]*)|([${chars}]*$)`,'g'), "");
}

Object.defineProperty(URL.prototype, 'segments', {
    get: function() { return this.pathname.trim('/').split('/') },
    configurable: true
});

URL.prototype.segment = function(n){
    return this.segments[n-1];
};
URL.prototype.firstSegment = function(){
        return this.segments[0]
}
URL.prototype.lastSegment = function(){
    return this.segments[this.segments.length-1]
}
