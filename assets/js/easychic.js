document.addEventListener("DOMContentLoaded", function () {
    // Setting event listeners for focus detection
    document.addEventListener("mousedown", () => {
        window.mouseDown = true;
    });

    document.addEventListener("mouseup", () => {
        window.mouseDown = false;
    });

    document.addEventListener("keydown", (e) => {
        if (e.key === "Tab") {
            window.keyboardFocus = true;
            window.mouseDown = false;
        }
    });

    // Get menu related elements
    const menuButton = document.getElementById("menu_open");
    const menu = document.getElementById("sp_menu_modal");
    const closeMenuButton = document.getElementById("menu_close");

    // Manage the menu state
    let isMenuOpen = false;

    // Focus trap settings
    const focusTrapStart = menu.querySelector(".focus-trap-start");
    const focusTrapEnd = menu.querySelector(".focus-trap-end");

    focusTrapStart.addEventListener("focus", () => {
        // When focus is on the first element, move focus to the last element
        closeMenuButton.focus();
    });

    focusTrapEnd.addEventListener("focus", () => {
        // When focus reaches the last element, move focus to the first menu item
        const firstMenuItem = menu.querySelector(".sp_menu a");
        if (firstMenuItem) {
            firstMenuItem.focus();
        }
    });

    // Menu opening function
    const openMenu = () => {
        menu.setAttribute("aria-hidden", "false");
        menu.removeAttribute("inert");
        menuButton.classList.add("open");
        menuButton.setAttribute("aria-expanded", "true");
        isMenuOpen = true;
        // Move focus to the first menu item when the menu is opened
        const firstMenuItem = menu.querySelector(".sp_menu a");
        if (firstMenuItem) {
            firstMenuItem.focus();
        }
    };

    // Menu close function
    const closeMenu = () => {
        menu.setAttribute("aria-hidden", "true");
        menu.setAttribute("inert", "");
        menuButton.classList.remove("open");
        menuButton.setAttribute("aria-expanded", "false");
        isMenuOpen = false;

        // Move focus to main when menu is closed
        const mainFirstLink = document.querySelector("main a");
        if (mainFirstLink) {
            mainFirstLink.focus();
        }
    };

    // A function to toggle the menu open or closed
    const toggleMenu = () => {
        if (isMenuOpen) {
            closeMenu();
        } else {
            openMenu();
        }
    };

    // Setting the click event
    menuButton.addEventListener("click", (e) => {
        e.preventDefault();
        toggleMenu();

        if (window.mouseDown) {
            menuButton.classList.add("mouse-focus");
            menuButton.classList.remove("keyboard-focus");
        }
    });

    // Setting focus events
    menuButton.addEventListener("focus", (e) => {
        if (window.mouseDown) {
            // mouse
            e.target.classList.add("mouse-focus");
            e.target.classList.remove("keyboard-focus");
        } else {
            // keyboard
            e.target.classList.add("keyboard-focus");
            e.target.classList.remove("mouse-focus");
            openMenu();
        }
    });

    // Esc
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && isMenuOpen) {
            menuButton.classList.remove("keyboard-focus");
            closeMenu();
        }
    });

    // Close the menu when a link in the menu is clicked
    const menuLinks = document.querySelectorAll(".sp_menu a");
    menuLinks.forEach((link) => {
        link.addEventListener("click", () => {
            closeMenu();
        });
    });

    // Menu close button click event
    closeMenuButton.addEventListener("click", () => {
        closeMenu();
    });

    closeMenuButton.addEventListener("focus", (e) => {
        menuButton.classList.remove("keyboard-focus");
        closeMenu();
    });


    //pc menu
    const menuItems = document.querySelectorAll(".menu-item-has-children");

    menuItems.forEach((item) => {
        const link = item.querySelector("a");
        const subMenu = item.querySelector(".sub-menu");
        const subMenuLinks = subMenu ? subMenu.querySelectorAll("a") : [];

        // Enter キーでサブメニューを開く
        link.addEventListener("keydown", (e) => {
            if (e.key === "Enter" || e.key === " ") {
                e.preventDefault();
                toggleSubMenu(subMenu);
            }
            // 下矢印キーでサブメニューの最初の項目にフォーカス
            if (e.key === "ArrowDown" && subMenu) {
                e.preventDefault();
                subMenu.style.opacity = "1";
                subMenu.style.visibility = "visible";
                subMenu.style.transform = "translateY(0)";
                if (subMenuLinks.length > 0) {
                    subMenuLinks[0].focus();
                }
            }
        });

        // サブメニュー内でのキーボードナビゲーション
        if (subMenuLinks.length > 0) {
            subMenuLinks.forEach((subLink, index) => {
                subLink.addEventListener("keydown", (e) => {
                    // 上矢印キー
                    if (e.key === "ArrowUp") {
                        e.preventDefault();
                        if (index === 0) {
                            link.focus();
                        } else {
                            subMenuLinks[index - 1].focus();
                        }
                    }
                    // 下矢印キー
                    if (e.key === "ArrowDown") {
                        e.preventDefault();
                        if (index < subMenuLinks.length - 1) {
                            subMenuLinks[index + 1].focus();
                        }
                    }
                    // Escキーでサブメニューを閉じて親メニューにフォーカス
                    if (e.key === "Escape") {
                        e.preventDefault();
                        hideSubMenu(subMenu);
                        link.focus();
                    }
                });
            });
        }
    });

    // サブメニューの表示/非表示を切り替える関数
    function toggleSubMenu(subMenu) {
        if (subMenu) {
            if (subMenu.style.visibility === "visible") {
                hideSubMenu(subMenu);
            } else {
                showSubMenu(subMenu);
            }
        }
    }

    function showSubMenu(subMenu) {
        subMenu.style.opacity = "1";
        subMenu.style.visibility = "visible";
        subMenu.style.transform = "translateY(0)";
    }

    function hideSubMenu(subMenu) {
        subMenu.style.opacity = "0";
        subMenu.style.visibility = "hidden";
        subMenu.style.transform = "translateY(-10px)";
    }


    // Smooth scrolling of links within a page
    const pageLinks = document.querySelectorAll('a[href^="#"]');

    pageLinks.forEach((link) => {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            const targetId = this.getAttribute("href").substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: "smooth",
                });
            }
        });
    });

    // Back to top of page button
    const pageTopButton = document.getElementById("page-top");
    pageTopButton.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });
});
