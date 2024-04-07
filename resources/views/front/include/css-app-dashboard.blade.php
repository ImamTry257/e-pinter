<style>
    /* Googlefont Poppins CDN Link */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    }

    nav{
    /* position: fixed;
    top: 0;
    left: 0; */
    width: 100%;
    height: 100%;
    height: 70px;
    z-index: 99;
    }
    nav .navbar{
    height: 100%;
    /* max-width: 1250px; */
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: auto;
    /* background: red; */
    padding: 0 50px;
    }
    .navbar .logo a{
    font-size: 30px;
    color: #000;
    text-decoration: none;
    font-weight: 600;
    }
    nav .navbar .nav-links{
    line-height: 70px;
    height: 100%;
    }
    nav .navbar .links{
    display: flex;
    }
    nav .navbar .links li{
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    list-style: none;
    padding: 0 14px;
    }
    nav .navbar .links li a{
    height: 100%;
    text-decoration: none;
    white-space: nowrap;
    color: #000;
    font-size: 15px;
    font-weight: 500;
    }
    .links li:hover .htmlcss-arrow,
    .links li:hover .js-arrow{
    transform: rotate(180deg);
    }

    nav .navbar .links li .arrow{
    /* background: red; */
    height: 100%;
    width: 22px;
    line-height: 70px;
    text-align: center;
    display: inline-block;
    color: #fff;
    transition: all 0.3s ease;
    }
    nav .navbar .links li .sub-menu{
    position: absolute;
    top: 70px;
    left: 0;
    line-height: 40px;
    background: #fff;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    border-radius: 0 0 4px 4px;
    display: none;
    z-index: 2;
    }
    nav .navbar .links li:hover .htmlCss-sub-menu,
    nav .navbar .links li:hover .js-sub-menu{
    display: block;
    }
    .navbar .links li .sub-menu li{
    padding: 0 22px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .navbar .links li .sub-menu a{
    color: #5f5b5b;
    font-size: 15px;
    font-weight: 500;
    }
    .navbar .links li .sub-menu .more-arrow{
    line-height: 40px;
    }
    .navbar .links li .htmlCss-more-sub-menu{
    /* line-height: 40px; */
    }
    .navbar .links li .sub-menu .more-sub-menu{
    position: absolute;
    top: 0;
    left: 100%;
    border-radius: 0 4px 4px 4px;
    z-index: 1;
    display: none;
    }
    .links li .sub-menu .more:hover .more-sub-menu{
    display: block;
    }
    .navbar .search-box{
    position: relative;
    height: 40px;
    width: 40px;
    }
    .navbar .search-box i{
    position: absolute;
    height: 100%;
    width: 100%;
    line-height: 40px;
    text-align: center;
    font-size: 22px;
    color: #5f5b5b;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    }
    .navbar .search-box .input-box{
        position: absolute;
        right: calc(100% - 40px);
        top: 80px;
        height: 60px;
        width: 300px;
        background: #004972;
        border-radius: 6px;
        opacity: 0;
        pointer-events: none;
        transition: all 0.4s ease;
    }
    .navbar.showInput .search-box .input-box{
    top: 65px;
    opacity: 1;
    pointer-events: auto;
    background: #004972;
    }
    .search-box .input-box::before{
    content: '';
    position: absolute;
    height: 20px;
    width: 20px;
    background: #004972;
    right: 10px;
    top: -6px;
    transform: rotate(45deg);
    }
    .search-box .input-box input{
    position: absolute;
    top: 50%;
    left: 50%;
    border-radius: 4px;
    transform: translate(-50%, -50%);
    height: 35px;
    width: 280px;
    outline: none;
    padding: 0 15px;
    font-size: 16px;
    border: none;
    }
    .navbar .nav-links .sidebar-logo{
    display: none;
    }
    .navbar .bx-menu{
    display: none;
    }

    nav .navbar .links li a:hover{
        color: #0b0b0b;
    }

    @media (max-width:920px) {
    nav .navbar{
        max-width: 100%;
        padding: 0 25px;
    }

    nav .navbar .logo a{
        font-size: 27px;
    }
    nav .navbar .links li{
        padding: 0 10px;
        white-space: nowrap;
    }
    nav .navbar .links li a{
        font-size: 15px;
    }
    }
    @media ( max-width:856px ){
    nav{
        /* position: relative; */
    }
    .navbar .bx-menu{
        display: block;
    }
    nav .navbar .nav-links{
        position: fixed;
        top: 0;
        left: -100%;
        display: block;
        max-width: 270px;
        width: 100%;
        background:  #004972;
        line-height: 40px;
        padding: 20px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.5s ease;
        z-index: 1000;
    }
    .navbar .nav-links .sidebar-logo{
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .sidebar-logo .logo-name{
        font-size: 25px;
        color: #5f5b5b;
    }
        .sidebar-logo  i,
        .navbar .bx-menu{
        font-size: 25px;
        color: #5f5b5b;
        }
    nav .navbar .links{
        display: block;
        margin-top: 20px;
    }
    nav .navbar .links li .arrow{
        line-height: 40px;
    }
    nav .navbar .links li{
        display: block;
    }
    nav .navbar .links li .sub-menu{
    position: relative;
    top: 0;
    box-shadow: none;
    display: none;
    }
    nav .navbar .links li .sub-menu li{
    border-bottom: none;

    }
    .navbar .links li .sub-menu .more-sub-menu{
    display: none;
    position: relative;
    left: 0;
    }
    .navbar .links li .sub-menu .more-sub-menu li{
    display: flex;
    align-items: center;
    justify-content: space-between;
    }
    .links li:hover .htmlcss-arrow,
    .links li:hover .js-arrow{
    transform: rotate(0deg);
    }
    .navbar .links li .sub-menu .more-sub-menu{
        display: none;
    }
    .navbar .links li .sub-menu .more span{
        /* background: red; */
        display: flex;
        align-items: center;
        /* justify-content: space-between; */
    }

    .links li .sub-menu .more:hover .more-sub-menu{
        display: none;
    }
    nav .navbar .links li:hover .htmlCss-sub-menu,
    nav .navbar .links li:hover .js-sub-menu{
        display: none;
    }
    .navbar .nav-links.show1 .links .htmlCss-sub-menu,
    .navbar .nav-links.show3 .links .js-sub-menu,
    .navbar .nav-links.show2 .links .more .more-sub-menu{
        display: block;
        }
        .navbar .nav-links.show1 .links .htmlcss-arrow,
        .navbar .nav-links.show3 .links .js-arrow{
            transform: rotate(180deg);
    }
        .navbar .nav-links.show2 .links .more-arrow{
        transform: rotate(90deg);
        }
    }
    @media (max-width:370px){
    nav .navbar .nav-links{
    max-width: 100%;
    }
    }

    html, body {
        height: 100%;
        margin: 0;
    }

    div.wrapper-main-header {
        position: relative;
        right: 0;
        left: 0;
    }

    div.wrapper-main-header, li ul#wrapper-sub-menu, div#sidebar-dashboard {
        background-color: #004972;
        z-index: 0;
    }

    li ul a#list-sub-menu {
        color: white;
    }

    li ul a#list-sub-menu:hover {
        color: #c5deed;
        padding: 0;
    }

    div.wrapper-main-content {
        height: 100%;
    }

    a.btn-dark-register {
        background-color: #282727;
    }

    a.btn-dark-register:hover {
        background-color: #000;
    }

    div.wrapper-footer {
        background-color: #004972;
        position: absolute;
        left: 0;
        right: 0;
        z-index: -2;
    }

    div.wrapper-footer h2.title-content-footer {
        font-size: 20px;
    }

    div.wrapper-footer p.desc-content-footer,
    div.wrapper-footer ul li {
        font-size: 10px;
    }

    /* header home */
    span.title-header {
        font-size: 16px;
    }

    /* end header home */

</style>
