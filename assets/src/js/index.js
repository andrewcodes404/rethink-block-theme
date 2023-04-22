// modals --- modals --- modals --- modals ---

const modalParents = document.querySelectorAll(".js-logo");
if (modalParents) {
  modalParents.forEach((modalParent) => {
    modalParent.addEventListener("click", function () {
      this.nextElementSibling.classList.add("rt-logo-modal-wrapper--show");
    });
  });
}

const modals = document.querySelectorAll(".js-modal");
if (modals) {
  modals.forEach((modal) => {
    modal.addEventListener('click', function () {
      this.classList.remove("rt-logo-modal-wrapper--show");
    })
  });
}




// const filterButtons = document.querySelectorAll(".filter-button");

// if (filterButtons) {
//   filterButtons.forEach((filterButton) => {
//     filterButton.addEventListener("click", () => {
//       console.log('addEventListener Fn 🏃🏻‍♂️');
//       // console.log('👻filter button clicked is..', filterButton);

//       // add active class to button remove active class from others in group
//       makeFilterActive(filterButton);

//       // find matching speakers in list
//       hideShowSpeakers();
//     });
//   });
// }

const progridItems = document.querySelectorAll(".progrid__item");

if (progridItems) {
  progridItems.forEach((progridItem) => {
    const progridItemInfo = progridItem.querySelector(".progrid__item-info");

    if (progridItemInfo) {
      const newMaxHeight = `${progridItem.offsetHeight}px`;

      progridItem.addEventListener("mouseenter", () => {
        // progridItemInfo.style.maxHeight = infoHeight + 30 + "px";

        progridItemInfo.style.maxHeight = newMaxHeight;
      });
      progridItem.addEventListener("mouseleave", () => {
        progridItemInfo.style.maxHeight = 0;
      });
    }
  });
}



// Carousel help fro multiple uses --- Carousel help fro multiple uses ---
// Carousel help fro multiple uses --- Carousel help fro multiple uses ---
// Carousel help fro multiple uses --- Carousel help fro multiple uses ---

// const carousel_all_in_one = document.querySelectorAll('.b-carousel--all-in-one')
// console.log('👻');
// carousel_all_in_one.forEach(carousel => {

//   console.log("yes");
//   var index = +1
//   var newClass = `b-carousel--all-in-one${index}`
//   carousel.classList.add(newClass)
//   console.log('newClass:', newClass);
// });

// / pro-global --- pro-global --- pro-global --- pro-global ---
// / pro-global --- pro-global --- pro-global --- pro-global ---
// / pro-global --- pro-global --- pro-global --- pro-global ---


// for mobile drop downs
const proGlobalTitles = document.querySelectorAll(".pro-global-tracks-title");
if (proGlobalTitles) {
  proGlobalTitles.forEach((proGlobalTitle) => {
    proGlobalTitle.addEventListener("click", () => {
      const tracks = proGlobalTitle.nextElementSibling;

      if (tracks.classList.contains("pro-global-track-wrapper--open")) {
        proGlobalTitle.classList.remove("pro-global-tracks-title--open");
        tracks.classList.remove("pro-global-track-wrapper--open");
      } else {
        tracks.classList.add("pro-global-track-wrapper--open");
        proGlobalTitle.classList.add("pro-global-tracks-title--open");
      }
    });
  });
}


// for day filter

const proGlobalButtons = document.querySelectorAll('.pro-global__button')


if (proGlobalButtons) {

  // const proGlobalButtonDay1 = document.querySelector('.pro-global__button--day1')
  // const proGlobalButtonDay2 = document.querySelector('.pro-global__button--day2')
  const proGlobalDay1 = document.querySelector('.pro-global__day1')
  const proGlobalDay2 = document.querySelector('.pro-global__day2')

  proGlobalButtons.forEach(proGlobalButton => {
    proGlobalButton.addEventListener('click', () => {

      // console.log('👻 clicked');

      const parent = proGlobalButton.parentElement;
      let sibling = ""
      // console.log('parent:', parent);


      if (parent.nextElementSibling) {
        sibling = parent.nextElementSibling
      } else if (parent.previousElementSibling) {
        sibling = parent.previousElementSibling
      }
      // console.log('sibling:', sibling);


      if (parent.classList.contains('pro-global__button-wrapper--active')) {

        // console.log('parent.classList:', parent.classList);

        parent.classList.remove('pro-global__button-wrapper--active')
        sibling.classList.add('pro-global__button-wrapper--active')

        if (parent.classList.contains('pro-global__button-wrapper--day1')) {

          proGlobalDay2.classList.add('pro-global__day2--show')
          proGlobalDay1.classList.remove('pro-global__day1--show')
        }

        if (parent.classList.contains('pro-global__button-wrapper--day2')) {
          // console.log(' proGlobalDay1:', proGlobalDay1);
          proGlobalDay1.classList.add('pro-global__day1--show')
          proGlobalDay2.classList.remove('pro-global__day2--show')
        }

      }



    })
  });

}


// NEW FILTERS --- NEW FILTERS --- NEW FILTERS ---
// NEW FILTERS --- NEW FILTERS --- NEW FILTERS ---
// NEW FILTERS --- NEW FILTERS --- NEW FILTERS ---

const speakerFilters = document.querySelector('#t-speaker__filters-wrapper');
if (speakerFilters) {
  const speakerRadiosLocation = speakerFilters.querySelectorAll('.speakerfilters__location')
  const speakerRadiosDay = speakerFilters.querySelectorAll('.speakerfilters__day')
  const speakerRadioDayActive = speakerFilters.querySelector('.t-speaker__filter--day-active')
  const speakerRadioLocationActive = speakerFilters.querySelector('.t-speaker__filter--location-active')
  const params = new URLSearchParams(window.location.search)
  // const url = window.location.pathname
  const param_day = params.get('day')
  const param_location = params.get('location')


  speakerRadiosLocation.forEach(radio => {
    if (radio.value === param_location) {
      speakerRadioLocationActive.classList.remove('t-speaker__filter--location-active')
      radio.checked = true;
      speakerRadioDayActive.classList.remove('t-speaker__filter--location-active')
      radio.parentElement.classList.add('t-speaker__filter--active')
    }

    radio.addEventListener('click', () => {
      const params = new URLSearchParams(window.location.search)
      params.set('location', radio.value)
      window.history.replaceState({}, '', `${location.pathname}?${params}`); // eslint-disable-line
      location.reload(); // eslint-disable-line
    })
  });


  speakerRadiosDay.forEach(radio => {
    if (radio.value === param_day) {
      radio.checked = true;
      speakerRadioDayActive.classList.remove('t-speaker__filter--day-active')
      radio.parentElement.classList.add('t-speaker__filter--active')
    }
    radio.addEventListener('click', () => {
      const params = new URLSearchParams(window.location.search)
      params.set('day', radio.value)
      window.history.replaceState({}, '', `${location.pathname}?${params}`); // eslint-disable-line
      location.reload(); // eslint-disable-line
    })
  });
}


// Anchor Links in page scroll --- Anchor Links in page scroll ---
// Anchor Links in page scroll --- Anchor Links in page scroll ---
// Anchor Links in page scroll --- Anchor Links in page scroll ---

const tabLinks = document.querySelectorAll('.rt-tab');
if (tabLinks) {
  tabLinks.forEach(tab => {
    const target = tab.getAttribute("href");
    tab.addEventListener('click', (event) => {
      event.preventDefault()
      const el = document.querySelector(target);
      const y = el.getBoundingClientRect().top + window.pageYOffset + -200;
      window.scrollTo({ top: y, behavior: "smooth" });
    })
  });
}

const nav = document.querySelector('.rt-navigation')
const navTop = nav.offsetTop;

function fixedNav() {
  if (window.scrollY >= navTop) {
    nav.classList.add('rt-navigation--shadow');
  } else {
    nav.classList.remove('rt-navigation--shadow');
  }
}

window.addEventListener('scroll', fixedNav);
