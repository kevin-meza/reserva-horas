div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
  <ul class="nav flex-column text-white w-100">
    <a href="#" class="nav-link h3 text-white my-2">
      Side Nav
    </a>
    <li href="#" class="nav-link">
      <span class="mx-2">Home</span>
    </li>
    <li href="#" class="nav-link">
      <span class="mx-2">About</span>
    </li>
    <li href="#" class="nav-link">
      <span class="mx-2">Contact</span>
    </li>
  </ul>
</div>
<div class="p-1 my-container active-cont">
    Main Content Here
    ...
    Replace the menu toggle icon as per your needs
    <a class="btn border-0" id="menu-btn">
      <i class="bx bx-menu"></i>
    </a>
  </div>
  <script>
  function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }

  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }
  </script>
<script>
   var menu_btn = document.querySelector("#menu-btn");
var sidebar = document.querySelector("#sidebar");
var container = document.querySelector(".my-container");
menu_btn.addEventListener("click", () => {
  sidebar.classList.toggle("active-nav");
  container.classList.toggle("active-cont");
});
    </script>
    <style>
        .side-navbar {
  width: 180px;
  height: 100%;
  position: fixed;
  margin-left: -300px;
  background-color: #100901;
  transition: 0.5s;
}
.nav-link:active,
.nav-link:focus,
.nav-link:hover {
  background-color: #ffffff26;
}
.my-container {
  transition: 0.4s;
}
.active-nav {
  margin-left: 0;
}
/* for main section */
.active-cont {
  margin-left: 180px;
}
#menu-btn {
  background-color: #100901;
  color: #fff;
  margin-left: -62px;
}
    </style>
