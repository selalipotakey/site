var w = window.innerWidth;
if (w < 650) {
    var parent_height = document.querySelector(".overlay .overlay-main").offsetHeight;
    var trim_height = document.querySelector(".overlay .overlay-main .trim").offsetHeight;
    var menu_height = parent_height - 2*(trim_height);
    console.log(menu_height)
    const li_number = document.querySelectorAll(".overlay .overlay-main ul.menu li").length;
    var individual_height = Math.floor(menu_height/li_number);

    document.querySelector(".overlay .overlay-main ul.menu").style.height = menu_height;
    var li_list = document.querySelectorAll(".overlay .overlay-main ul.menu li");
    var li_array = [...li_list];
    li_array.forEach(list_element => {
        list_element.style.height = individual_height + "px";
    });
    console.log('hello')
}

