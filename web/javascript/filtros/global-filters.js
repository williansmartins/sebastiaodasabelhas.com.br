angular.module('controlei')
.filter('myDateFormat', function myDateFormat($filter){
  return function(text){
  	console.info(text);
    var tempdate = new Date(text.replace(/-/g,"/")); 
    return $filter('date')(tempdate, "dd/MM/yyyy");
  }
});

angular.module('controlei')
.filter('toArray', function () {
  return function (obj, addKey) {
    if (!angular.isObject(obj)) return obj;
    if ( addKey === false ) {
      return Object.keys(obj).map(function(key) {
        return obj[key];
      });
    } else {
      return Object.keys(obj).map(function (key) {
        var value = obj[key];
        return angular.isObject(value) ?
          Object.defineProperty(value, '$key', { enumerable: false, value: key}) :
          { $key: key, $value: value };
      });
    }
  };
});