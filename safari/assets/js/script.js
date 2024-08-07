document.addEventListener("DOMContentLoaded", function() {
    var toggleBtnOpen = document.querySelector('.toggle-btn-open');
    var toggleBtnClose = document.querySelector('.menu-close-btn');
    var mobileMenuContainer = document.querySelector('.mobile-menu-container');

    if (toggleBtnOpen && toggleBtnClose && mobileMenuContainer) {
        mobileMenuContainer.style.left = '100%';
        mobileMenuContainer.style.transition = 'left 0.5s ease-in-out';

        toggleBtnOpen.addEventListener('click', function() {
            setTimeout(function() {
                mobileMenuContainer.style.left = '0';
            }, 10);
        });

        toggleBtnClose.addEventListener('click', function() {
            setTimeout(function() {
                mobileMenuContainer.style.left = '100%';
            }, 10);
        });
    }
});

document.addEventListener("DOMContentLoaded", function() {
    var slides = document.querySelectorAll('.slide');
    var currentSlide = 0;
    var nextButton = document.querySelector('.next-slide');
    var prevButton = document.querySelector('.prev-slide');
    var isTransitioning = false;

    var currentPageNumber = document.querySelector('.page-number');
    var pageProgressBar = document.querySelector('.pagination-progress-percent');

    if(slides.length>0){
        currentPageNumber.innerHTML = '01';

        progressBarHeight = 100/slides.length;
        pageProgressBar.style.height = progressBarHeight+'%';

        function initializeSlides() {
            slides.forEach(function(slide, i) {
                slide.style.opacity = i === currentSlide ? '1' : '0';
                slide.style.visibility = i === currentSlide ? 'visible' : 'hidden';
                var dataId = slide.getAttribute('data-id');
                var pageNumberElement = slide.querySelector('.page-number');
                var lastPageNumber = slide.querySelector('.last-page');
                var slideProgressBar = slide.querySelector('.pagination-progress-percent');
                lastPageNumber.innerHTML = '0'+slides.length;
                pageNumberElement.innerHTML = '0'+dataId;
                progressBarHeight = (100/slides.length)*dataId;
                slideProgressBar.style.height = progressBarHeight+'%';

            });
        }

        function showSlide(index) {
            if (isTransitioning) return;
            isTransitioning = true;

            slides[currentSlide].style.opacity = '0';
            slides[currentSlide].style.visibility = 'hidden';

            slides[index].style.opacity = '1';
            slides[index].style.visibility = 'visible';

            currentSlide = index;

            setTimeout(function() {
                isTransitioning = false;
            }, 500);
        }

        nextButton.addEventListener('click', function() {
            if (!isTransitioning) {
                var nextSlide = (currentSlide + 1) % slides.length;
                showSlide(nextSlide);
            }
        });

        prevButton.addEventListener('click', function() {
            if (!isTransitioning) {
                var prevSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(prevSlide);
            }
        });

        initializeSlides();

    }



});

document.addEventListener('DOMContentLoaded', function() {
    var acc = document.getElementsByClassName('accordion-title');
    for (var i = 0; i < acc.length; i++) {
        acc[i].addEventListener('click', function() {
            var content = this.nextElementSibling;
            var parent = this.parentElement;

            if (content.style.display === 'block') {
                slideUp(content, 400);
                parent.classList.remove('active');
            } else {
                slideDown(content, 400);
                parent.classList.add('active');
            }
        });
    }
});

function slideDown(element, duration = 400) {
    element.style.display = 'block';
    element.style.height = '0px';
    let height = element.scrollHeight;

    let step = height / (duration / 16.67);
    let currentHeight = 0;

    function expand() {
        currentHeight += step;
        if (currentHeight >= height) {
            element.style.height = height + 'px';
        } else {
            element.style.height = currentHeight + 'px';
            requestAnimationFrame(expand);
        }
    }
    requestAnimationFrame(expand);
}

function slideUp(element, duration = 400) {
    let height = element.scrollHeight;
    let step = height / (duration / 16.67);
    let currentHeight = height;

    function collapse() {
        currentHeight -= step;
        if (currentHeight <= 0) {
            element.style.height = '0px';
            element.style.display = 'none';
        } else {
            element.style.height = currentHeight + 'px';
            requestAnimationFrame(collapse);
        }
    }
    requestAnimationFrame(collapse);
}


jQuery(document).ready(function($) {
    function calculate() {
        var number1 = parseFloat($('.number1').val()) || 0;
        var number2 = parseFloat($('.number2').val()) || 0;
        var operation = $('.operation').val();

        $.ajax({
            url: ajaxurl,
            method: 'POST',
            data: {
                action: 'calculate',
                number1: number1,
                number2: number2,
                operation: operation
            },
            success: function(response) {
                $('.calculator-result strong').text(response);
                $('.calculator-result').show();
            },
            error: function() {
                $('.calculator-result strong').text('Error occurred');
                $('.calculator-result').show();
            }
        });
    }

    $('.number1, .number2, .operation').on('input change', calculate);
});




