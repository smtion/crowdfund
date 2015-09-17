var sm = {
	debug_mode : true,
	console : window.console || {log: function(){}, error: function(){}, warm: function(){}, info: function(){}},
	printError : function(obj) {
		this.console.error("[Error] ", obj);
	},
	printLog : function(obj) {
		if(this.debug_mode) this.console.log("[Debug] ", obj);	
	},
	alert : function(str) {
		if(str) alert(str);
	},
	redirect : function(url) {
		if(url) location.href = url;
	},
	ajax : function(url, data, callback) {
		$.ajax({
			type: "POST",
			url: encodeURI(url),
			data: data,
			cache: false,
			async: false,
			dataType:"text",
			success: function(res) {
				if (callback != null) callback(JSON.parse(res));
			},	
			error: function(xhr, status, e) {
				//sm.printError(status);
				sm.printError(e);
			}
		});
	},
	ajaxAsync : function(url, data, callback) {
		$.ajax({
			type: "POST",
			url: encodeURI(url),
			data: data,
			cache: false,
			async: true,
			success: function(res) {
				if (callback != null) callback(res);
			},	
			error: function(xhr, status, e) {
				//sm.printError(status);
				sm.printError(e);
			}
		});
	},
	ajaxUpload : function(url, data, callback) {
		$.ajax({
			type: "POST",
			url: encodeURI(url),
			data: data,
			dataType: 'text',
			processData: false,
			contentType: false,
			cache: false,
			async: false,
			success: function(res) {
				if (callback != null) callback(res);
			},	
			error: function(xhr, status, e) {
				//sm.printError(status);
				sm.printError(e);
			}
		});
	},
	get_object_by_form : function(form_id) {
		var obj = {};
	
		$.each($("#"+form_id).serializeArray(), function(){
			if (obj[this.name] !== undefined) {
				if (!obj[this.name].push) {
					obj[this.name] = [obj[this.name]];
				}
				obj[this.name].push(this.value || '');
			} else {
				obj[this.name] = this.value || '';
			}
		});
	
		return obj;
	},
	unit_format: function(num, unit) {
		if(num>=1000) {
			if(unit=="Mn") unit = "Bn";
			else if(unit=="Bn") unit = "Tn";
			else if(unit=="Tn") unit = "Qn";
				
			return num/1000 + unit;
		}
		return num + unit;
	},
	format_file_size: function(bytes) {
		bytes = bytes * 1;
        if (typeof bytes !== 'number') {
            return '';
        }
        if (bytes >= 1000000000) {
            return (bytes / 1000000000).toFixed(2) + ' GB';
        }
        if (bytes >= 1000000) {
            return (bytes / 1000000).toFixed(2) + ' MB';
        }
        return (bytes / 1000).toFixed(2) + ' KB';
    }
    
	/*
	,timer : null
	,cur_target : null
	,print_result : function(target, html, type, time) {
		var add_class = type==ERROR ? "alert-danger" : type==SUCCESS ? "alert-success" : type==WARNING ? "alert-warning" : type==INFO ? "alert-info" : "";
		var t = new Date().getTime();
		//var timer = null;
		//var html = "<span id='" + t + "'" + "class='alert " +  add_class + "'><strong>" + html + "</strong></span>";
		var html = "<span class='alert " +  add_class + "'><strong>" + html + "</strong></span>";

		//$("#"+target).append(html);
		$("#"+target).html(html);
		$("#"+target).show();				
		
		if ( this.timer != null ) {
			if ( this.cur_target != target ) {
				$("#"+this.cur_target).fadeOut("slow");
			}
			clearTimeout(this.timer);
		}
		
		this.cur_target = target;
		this.timer = setTimeout( function() { 
			$("#"+target).fadeOut("slow");
			//$("#"+target).html("");
		}, time);
	}
	*/
};


var chk = {
	email : function(str){
		var reg = /^([A-Za-z0-9_\.-]+)@([A-Za-z0-9_]+)(\.[0-9A-Za-z]+){1,2}$/;
		return reg.test(str);
	}
	,len : function(str, len){
		return str.length >= len;
	}
};

var get = {
	timestamp : function(){
		return ts = new Date().getTime().toString();
		//return ts.substr(0, ts.length - 3);
	}
};

$.fn.toggleOption = function( show ) {
	$( this ).toggle( show );
	if( show ) {
		if( $( this ).parent( 'span.toggleOption' ).length )
			$( this ).unwrap( );
	} else {
		if( $( this ).parent( 'span.toggleOption' ).length == 0 )
			$( this ).wrap( '<span class="toggleOption" style="display: none;" />' );
	}
};