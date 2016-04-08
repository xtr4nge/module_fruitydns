// BLOCK 1
function sortObject(object) {
    return Object.keys(object).sort().reduce(function (result, key) {
        result[key] = object[key];
        return result;
    }, {});
}

function loadDNSspoofSetup()
{
    $(document).ready(function() { 
        $.getJSON('includes/ws_action.php?method=getA', function(data) {
            var div = document.getElementById('domain');
            div.innerHTML = ""
            console.log(data);
            data = sortObject(data)
            $.each(data, function(key, val) {
                
                content = "<div class='div0'>"
                content = content + "<div class='divAction'><a href='#' onclick=\"delA('" + key + "')\">x</a></div>"
                content = content + "<div class='div1'>" + key + "</div>"
                content = content + "<div class='divDivision'> | </div>"
                content = content + "<div class='div1'>" + val + "</div>"
                content = content + "</div>";
                div.innerHTML = div.innerHTML + content
                /*
                if (val == "enabled") {
                    content = ""
                    content = "<div class='div0'><div class='div1'>" + val + "</div>"
                    content = content + "<div class='divEnabled'>enabled</div><div class='divDivision'> | </div>"
                    content = content + "<div class='divAction'><a href='#' onclick=\"setModulesStatus('" + key + "',0)\">stop</a></div>"
                    content = content + "<a href='#' onclick='loadContent()'>view</a></div>";
                    
                    div.innerHTML = div.innerHTML + content
                } else {
                    content = "<div class='div0'>"
                    content = content + "<div class='divAction'><a href='#' onclick=\"delA('" + key + "')\">x</a></div>"
                    content = content + "<div class='div1'>" + key + "</div>"
                    content = content + "<div class='divDivision'> | </div>"
                    content = content + "<div class='div1'>" + val + "</div>"
                    content = content + "</div>";
                    div.innerHTML = div.innerHTML + content
                }
                */
            });
        });    
    
    });
}
//loadPlugins()

function setA()
{
    $(document).ready(function() {
        
        domain = document.getElementById("setA_domain").value;
        ip = document.getElementById("setA_ip").value;
        
        $.getJSON('includes/ws_action.php?method=setA&domain=' + domain + '&ip=' + ip, function(data) {
            //alert(data);
        });
        
        loadDNSspoofSetup()
    
    });
}

function delA(domain)
{
    $(document).ready(function() {

        $.getJSON('includes/ws_action.php?method=delA&domain=' + domain, function(data) {
            //alert(data);
        });
        
        loadDNSspoofSetup()
    
    });
}

function setModulesStatus(module, action) {
    $(document).ready(function() { 
        $.getJSON('includes/ws_action.php?method=setModulesStatus&module=' + module + '&action=' + action, function(data) {
        });
        /*
        $.postJSON = function(url, data, func)
        {
            $.post(url, data, func, 'json');
        }
        */
    });
    setTimeout(loadDNSspoofSetup, 500);
}