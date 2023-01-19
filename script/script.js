

window.onload = function () {
    document.getElementsByClassName("container_container-header_nav_ul_li")[1].addEventListener("mouseover",addStyle);
    function addStyle() {
        document.getElementsByClassName("container_container-header_nav_ul_li_a")[1].style.color = "gold";

        document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.visibility = "visible";
        document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.display = "flex";
        document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.flexDirection = "column";
        document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.justifyContent = "space-between";
        // document.body.style.backgroundColor = "black";
        
        let elements = document.getElementsByClassName("container_container-header_nav_ul_li_ul-request_li");

        Array.from(elements).forEach(element => {
           element.style.visibility = "visible";
           element.style.display = "block"; 
        });

        let elements2 = document.getElementsByClassName("container_container-header_nav_ul_li_ul-request_li_a");

        Array.from(elements2).forEach(element => {
            element.style.visibility = "visible";
            element.style.display = "block";  
        });
    }

    

    document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].addEventListener("mouseout",removeStyle);

    document.getElementsByClassName("container_container-header_nav_ul_li")[1].addEventListener("mouseout",removeStyle);

    function removeStyle() {
        document.getElementsByClassName("container_container-header_nav_ul_li_a")[1].style.color = "cadetblue";
        document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.visibility = "hidden";
        document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.display = "none";
        document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.flexDirection = "";
        document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.justifyContent = "";
        //document.body.style.backgroundColor = "black";
        
        let elements = document.getElementsByClassName("container_container-header_nav_ul_li_ul-request_li");

        Array.from(elements).forEach(element => {
           element.style.visibility = "hidden";
           element.style.display = "none"; 
        });

        let elements2 = document.getElementsByClassName("container_container-header_nav_ul_li_ul-request_li_a");

        Array.from(elements2).forEach(element => {
            element.style.visibility = "hidden";
            element.style.display = "none";  
        });
    }

//    document.getElementsByName("visible")[0].addEventListener("click",()=>{let id = document.getElementsByName("visible")[0].id;id= parseInt(id);if(id>0){console.log(id);document.getElementsByName("visible")[9].style.display = "none";document.getElementsByName("visible")[9].style.visibility = "hidden";document.getElementsByName("visible")[9].name = "hidden";let newId = id - 1; document.getElementById(newId).style.display = ""; document.getElementById(newId).style.visibility = ""; document.getElementById(newId).name = "visible";}});
    
}