const app = {
    func: {
        resizeWidth() {
            window.addEventListener('resize', (e) => {
                // console.log(e.target.innerWidth);
                // console.log(navbarBtnJs);
                app.handleNavvarBtn(e.target.innerWidth)
            })
        }
    },
    start() {
        this.navbarEvent();
        this.handleNavvarBtn(window.innerWidth);
        this.handleFormSelect();
        this.func.resizeWidth();
    },
    navbarEvent() {
        const navList = document.querySelector('.navbar__list');
        const navbarAuthIconSm = document.querySelector('.navbar__auth-icon-sm');
        const closeNavList = document.querySelector('.close-custom');
        navbarAuthIconSm.addEventListener('click', (e) => {
            if (!navList.classList.contains('show')) {
                navList.classList.add('show');
            }
        });
        closeNavList.addEventListener('click', () => {
            if (navList.classList.contains('show')) {
                navList.classList.remove('show');
            }
        })
    },
    handleNavvarBtn(windownWidth) {
        const navbarBtnJs = document.querySelector('.navbar__btn-js');
        if ((windownWidth > 576 && windownWidth < 860) || (windownWidth < 305)) {
            if (!navbarBtnJs.classList.contains('hiden')) {
                navbarBtnJs.classList.add('hiden');
            }
        } else {
            if (navbarBtnJs.classList.contains('hiden')) {
                navbarBtnJs.classList.remove('hiden');
            }
        }
    }, 
    handleFormSelect() {
        const formSelect = document.querySelector('.form__group .form__select');
        const selectValue = formSelect.querySelector('input[type="text"]');
        const optionValues = formSelect.querySelectorAll('.select-option span');

        optionValues.forEach(option => {
            option.addEventListener('click', (e) => {
                selectValue.value = option.getAttribute('value');
                if (formSelect.classList.contains('select')) {
                    formSelect.classList.remove('select');
                }
            })
        })
        formSelect.addEventListener('click', (e) => {
            if (e.target.classList.contains('show-option')) {
                if (formSelect.classList.contains('select')) {
                    formSelect.classList.remove('select');
                } else {
                    formSelect.classList.add('select');
                }
            }
        });
        
    },
    
   
}
    app.start();
