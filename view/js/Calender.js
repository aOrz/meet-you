var $ = function (id) {
    return "string" == typeof id ? document.getElementById(id) : id;
};

var Class = {
  create: function() {
    return function() {
      this.initialize.apply(this, arguments);
    }
  }
}

Object.extend = function(destination, source) {
    for (var property in source) {
        destination[property] = source[property];
    }
    return destination;
}


var Calendar = Class.create();
Calendar.prototype = {
  initialize: function(container, options) {
	this.Container = $(container);
	this.Days = [];
	
	this.SetOptions(options);
	
	this.Year = this.options.Year;
	this.Month = this.options.Month;
	this.SelectDay = this.options.SelectDay ? new Date(this.options.SelectDay) : null;
	this.onSelectDay = this.options.onSelectDay;
	this.onToday = this.options.onToday;
	this.onFinish = this.options.onFinish;	
	
	this.Draw();
  },
  SetOptions: function(options) {
	this.options = {
		Year:			new Date().getFullYear(),
		Month:			new Date().getMonth() + 1,
		SelectDay:		null,
		onSelectDay:	function(){},
		onToday:		function(){},
		onFinish:		function(){}
	};
	Object.extend(this.options, options || {});
  },
  PreMonth: function() {
	var d = new Date(this.Year, this.Month - 2, 1);

	this.Year = d.getFullYear();
	this.Month = d.getMonth() + 1;

	this.Draw();
  },  

  NextMonth: function() {
	var d = new Date(this.Year, this.Month, 1);
	this.Year = d.getFullYear();
	this.Month = d.getMonth() + 1;
	this.Draw();
  },

  Draw: function() {
	var arr = [];
	for(var i = 1, firstDay = new Date(this.Year, this.Month - 1, 1).getDay(); i <= firstDay; i++){ arr.push("&nbsp;"); }
	for(var i = 1, monthDay = new Date(this.Year, this.Month, 0).getDate(); i <= monthDay; i++){ arr.push(i); }
	
	var frag = document.createDocumentFragment();
	
	this.Days = [];
	
	while(arr.length > 0){
		var row = document.createElement("tr");
		for(var i = 1; i <= 7; i++){
			var cell = document.createElement("td");
			cell.innerHTML = "&nbsp;";
			
			if(arr.length > 0){
				var d = arr.shift();
				cell.innerHTML = d;
				if(d > 0){
					this.Days[d] = cell;
					if(this.IsSame(new Date(this.Year, this.Month - 1, d), new Date())){ this.onToday(cell); }
					if(this.SelectDay && this.IsSame(new Date(this.Year, this.Month - 1, d), this.SelectDay)){ this.onSelectDay(cell); }
				}
			}
			row.appendChild(cell);
		}
		frag.appendChild(row);
	}
	
	while(this.Container.hasChildNodes()){ this.Container.removeChild(this.Container.firstChild); }
	this.Container.appendChild(frag);
	
	this.onFinish();
  },
  IsSame: function(d1, d2) {
	return (d1.getFullYear() == d2.getFullYear() && d1.getMonth() == d2.getMonth() && d1.getDate() == d2.getDate());
  } 
};


var cale = new Calendar("idCalendar", {
	SelectDay: new Date().setDate(10),
	onSelectDay: function(o){ o.className = "onSelect"; },
	onToday: function(o){ o.className = "onToday"; },
	onFinish: function(){
		$("idCalendarYear").innerHTML = this.Year; $("idCalendarMonth").innerHTML = this.Month;
		var flag = [10,15,20];
		for(var i = 0, len = flag.length; i < len; i++){
			this.Days[flag[i]].innerHTML = "<a href='javascript:void(0);' onclick=\"alert('������:"+this.Year+"/"+this.Month+"/"+flag[i]+"');return false;\">" + flag[i] + "</a>";
		}
	}
});

$("idCalendarPre").onclick = function(){ cale.PreMonth(); }
$("idCalendarNext").onclick = function(){ cale.NextMonth(); }