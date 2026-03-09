document.addEventListener("DOMContentLoaded", function () {

    const filterBtns = document.querySelectorAll(".filter-btn-am");
    const cards = document.querySelectorAll(".team-card-am");

    filterBtns.forEach(btn => {

        btn.addEventListener("click", function () {

            filterBtns.forEach(b => b.classList.remove("active-am"));
            this.classList.add("active-am");

            const filter = this.getAttribute("data-filter");

            cards.forEach(card => {

                if (filter === "all") {
                    card.style.display = "block";
                } else {
                    if (card.classList.contains(filter)) {
                        card.style.display = "block";
                    } else {
                        card.style.display = "none";
                    }
                }

            });

        });

    });

});


  document.querySelectorAll('.faq-item-am').forEach(item => {
  const question = item.querySelector('.faq-question-am');
  
  question.addEventListener('click', () => {
    const isActive = item.classList.contains('active');

    // 1. Optional: Close all other FAQ items first (Accordion Style)
    document.querySelectorAll('.faq-item-am').forEach(otherItem => {
      otherItem.classList.remove('active');
    });

    // 2. Toggle the clicked item
    if (!isActive) {
      item.classList.add('active');
    }
  });
});