/**
 * CloudTech Grid - Animated Table of Contents & Scroll-Spy Engine
 * Features smooth sliding active bar indicator matching Cloudflare design
 */
document.addEventListener('DOMContentLoaded', () => {
  const contentArea = document.querySelector('.entry-content');
  const tocList = document.getElementById('toc-list');
  const tocWrapper = document.getElementById('toc-wrapper');

  if (!contentArea || !tocList) return;

  const headings = contentArea.querySelectorAll('h2, h3');
  if (headings.length === 0) {
    if (tocWrapper) tocWrapper.style.display = 'none';
    return;
  }

  // Ensure TOC List Wrapper & Active Bar Indicator exist
  let listWrapper = tocList.parentElement;
  if (!listWrapper.classList.contains('toc-list-wrapper')) {
    const wrapper = document.createElement('div');
    wrapper.className = 'toc-list-wrapper';
    tocList.parentNode.insertBefore(wrapper, tocList);
    wrapper.appendChild(tocList);
    listWrapper = wrapper;
  }

  // Track Line & Animated Active Indicator Bar
  let trackLine = listWrapper.querySelector('.toc-track-line');
  if (!trackLine) {
    trackLine = document.createElement('div');
    trackLine.className = 'toc-track-line';
    listWrapper.prepend(trackLine);
  }

  let activeBar = listWrapper.querySelector('.toc-active-bar');
  if (!activeBar) {
    activeBar = document.createElement('div');
    activeBar.className = 'toc-active-bar';
    listWrapper.prepend(activeBar);
  }

  // Clear existing items
  tocList.innerHTML = '';

  const tocLinks = [];

  headings.forEach((heading, index) => {
    // Generate slug ID if missing
    if (!heading.id) {
      const slug = heading.textContent
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/(^-|-$)/g, '');
      heading.id = slug || `section-${index + 1}`;
    }

    const li = document.createElement('li');
    li.className = `toc-item level-${heading.tagName.toLowerCase()}`;

    const link = document.createElement('a');
    link.href = `#${heading.id}`;
    link.textContent = heading.textContent;

    link.addEventListener('click', (e) => {
      e.preventDefault();
      const targetElement = document.getElementById(heading.id);
      if (targetElement) {
        targetElement.scrollIntoView({ behavior: 'smooth' });
        history.pushState(null, null, `#${heading.id}`);
      }
    });

    li.appendChild(link);
    tocList.appendChild(li);

    tocLinks.push({
      heading: heading,
      liItem: li,
      link: link
    });
  });

  // Function to move the sliding active indicator bar smoothly
  function updateActiveIndicator(activeItem) {
    if (!activeItem || !activeBar || !listWrapper) return;
    
    const wrapperRect = listWrapper.getBoundingClientRect();
    const itemRect = activeItem.getBoundingClientRect();

    const topOffset = itemRect.top - wrapperRect.top;
    const height = itemRect.height;

    activeBar.style.transform = `translateY(${topOffset}px)`;
    activeBar.style.height = `${height}px`;
    activeBar.style.opacity = '1';
  }

  // Intersection Observer for Scroll Spy Highlighting
  const observerOptions = {
    root: null,
    rootMargin: '-80px 0px -55% 0px',
    threshold: 0
  };

  const observer = new IntersectionObserver((entries) => {
    let currentActive = null;

    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const id = entry.target.id;
        tocLinks.forEach(item => {
          if (item.heading.id === id) {
            item.liItem.classList.add('active');
            currentActive = item.liItem;
          } else {
            item.liItem.classList.remove('active');
          }
        });
      }
    });

    if (currentActive) {
      updateActiveIndicator(currentActive);
    }
  }, observerOptions);

  headings.forEach(heading => observer.observe(heading));

  // Initialize position for first active item
  if (tocLinks.length > 0) {
    tocLinks[0].liItem.classList.add('active');
    setTimeout(() => {
      updateActiveIndicator(tocLinks[0].liItem);
    }, 100);
  }
});
