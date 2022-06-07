/**
 * @author J
 * 
 * CGI JSON parser
 * 
 * namespace cjp_
 * 
 * 
 */
	
	var cjp_data = new Array();
	
	function cjp_getData(url){
	    try {
	        $.ajaxSetup({ cache: false, async: false });
	        $.get(url)
            .success(function (data) {
                cjp_ajaxCallback(data);
            })
            .error(function (e, xhr, settings) {
                if (e.status == 12029) {
                    cjp_data = -2
                    parent.parent.Network_cgi_status = -2;
                }
                else {
                    cjp_data = -1;
                }
            })

	        return cjp_data;
	    }
	    catch (e) {
	        return -1;
	    }
	}
	
	
	function cjp_ajaxCallback(response){

	    //console.log(response);
	    cjp_data = JSON.parse(response);
		
	    //return cjp_data;
	}
	
	
