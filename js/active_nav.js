const activePage = window.location.pathname;
console.log(activePage)
const asideLinks = document.querySelectorAll('.top-aside li').forEach(li => {
    const link = li.querySelector('a');
    if (link && link.href.includes(`${activePage}`)) {
        li.classList.add('active');
    }
});
