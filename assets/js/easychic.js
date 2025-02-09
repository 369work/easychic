document.addEventListener("DOMContentLoaded", function () {
    // フォーカス検出のためのグローバル状態管理
    const focusState = {
        mouseDown: false,
        keyboardFocus: false,
    };

    // フォーカス状態を更新するイベントリスナー
    function setupFocusEventListeners() {
        document.addEventListener(
            "mousedown",
            () => (focusState.mouseDown = true)
        );
        document.addEventListener(
            "mouseup",
            () => (focusState.mouseDown = false)
        );
        document.addEventListener("keydown", (e) => {
            if (e.key === "Tab") {
                focusState.keyboardFocus = true;
                focusState.mouseDown = false;
            }
        });
    }

    // スマートフォンメニューの管理
    function setupMobileMenu() {
        const menuButton = document.getElementById("menu_open");
        const menu = document.getElementById("sp_menu_modal");
        const closeMenuButton = document.getElementById("menu_close");
        let isMenuOpen = false;

        // フォーカストラップの設定
        const focusTrapStart = menu.querySelector(".focus-trap-start");
        const focusTrapEnd = menu.querySelector(".focus-trap-end");

        function setupFocusTrap() {
            focusTrapStart.addEventListener("focus", () => {
                closeMenuButton.focus();
            });

            focusTrapEnd.addEventListener("focus", () => {
                const firstMenuItem = menu.querySelector(".sp_menu a");
                if (firstMenuItem) firstMenuItem.focus();
            });
        }

        function openMenu() {
            menu.setAttribute("aria-hidden", "false");
            menu.removeAttribute("inert");
            menuButton.classList.add("open");
            menuButton.setAttribute("aria-expanded", "true");
            isMenuOpen = true;

            const firstMenuItem = menu.querySelector(".sp_menu a");
            if (firstMenuItem) firstMenuItem.focus();
        }

        function closeMenu() {
            menu.setAttribute("aria-hidden", "true");
            menu.setAttribute("inert", "");
            menuButton.classList.remove("open");
            menuButton.setAttribute("aria-expanded", "false");
            isMenuOpen = false;

            const mainFirstLink = document.querySelector("main a");
            if (mainFirstLink) mainFirstLink.focus();
        }

        function toggleMenu() {
            isMenuOpen ? closeMenu() : openMenu();
        }

        function setupMenuButtonEvents() {
            menuButton.addEventListener("click", (e) => {
                e.preventDefault();
                toggleMenu();

                if (focusState.mouseDown) {
                    menuButton.classList.add("mouse-focus");
                    menuButton.classList.remove("keyboard-focus");
                }
            });

            menuButton.addEventListener("focus", (e) => {
                if (focusState.mouseDown) {
                    e.target.classList.add("mouse-focus");
                    e.target.classList.remove("keyboard-focus");
                } else {
                    e.target.classList.add("keyboard-focus");
                    e.target.classList.remove("mouse-focus");
                    openMenu();
                }
            });
        }

        function setupCloseEvents() {
            document.addEventListener("keydown", (e) => {
                if (e.key === "Escape" && isMenuOpen) {
                    menuButton.classList.remove("keyboard-focus");
                    closeMenu();
                }
            });

            const menuLinks = document.querySelectorAll(".sp_menu a");
            menuLinks.forEach((link) => {
                link.addEventListener("click", closeMenu);
            });

            closeMenuButton.addEventListener("click", closeMenu);
            closeMenuButton.addEventListener("focus", () => {
                menuButton.classList.remove("keyboard-focus");
                closeMenu();
            });
        }

        setupFocusTrap();
        setupMenuButtonEvents();
        setupCloseEvents();
    }

    // PCメニューの管理
    function setupDesktopMenu() {
        const menuItems = document.querySelectorAll(".menu-item-has-children");

        menuItems.forEach((menuItem) => {
            const mainLink = menuItem.querySelector("a");
            const subMenu = menuItem.querySelector(".sub-menu");

            if (mainLink && subMenu) {
                let isSubMenuVisible = false;

                mainLink.addEventListener("keydown", (event) => {
                    // Tab時の処理
                    if (!event.shiftKey && event.key === "Tab") {
                        // サブメニューが非表示の場合は表示する
                        if (!isSubMenuVisible) {
                            event.preventDefault();
                            subMenu.style.display = "block";
                            isSubMenuVisible = true;

                            // サブメニューの最初のリンクにフォーカスする
                            const firstSubLink = subMenu.querySelector("li a");
                            if (firstSubLink) {
                                firstSubLink.focus();
                            }
                        }
                    }
                });

                // Shift+Tab時の処理
                menuItem.addEventListener("keydown", (event) => {
                    if (event.shiftKey && event.key === "Tab") {
                        // サブメニューが非表示の場合は表示する
                        if (!isSubMenuVisible) {
                            event.preventDefault();
                            subMenu.style.display = "block";
                            isSubMenuVisible = true;

                            // サブメニューの最後のリンクにフォーカスする
                            const lastSubLink =
                                subMenu.querySelector("li:last-child a");
                            const firstSubLink = subMenu.querySelector("li a");
                            if (lastSubLink) {
                                lastSubLink.focus();
                            } else if (firstSubLink) {
                                firstSubLink.focus();
                            }
                        }
                    }
                });

                // フォーカスが外れた時にサブメニューを非表示にする
                menuItem.addEventListener("focusout", (event) => {
                    if (!menuItem.contains(event.relatedTarget)) {
                        subMenu.style.display = "none";
                        isSubMenuVisible = false;
                    }
                });
            }
        });
    }

    function init() {
        setupFocusEventListeners();
        setupMobileMenu();
        setupDesktopMenu();
    }

    init();

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
