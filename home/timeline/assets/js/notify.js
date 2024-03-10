notifyPositionCalc = (notifyEl) => {
    let notiFyiers = $('.notify:not(.-hidden)')
    let notifyCounter = notiFyiers.length;
    if (!notifyEl) {
      notiFyiers.map((i,v) => {
        $(v).css('top', (i - 1) * ($(v).outerHeight() + 10) + 'px');
      })
      return true;
    }
   
    if (notifyCounter >= 1) {
      notifyEl.css('top', (notifyCounter - 1) * (notifyEl.outerHeight() + 10) + 'px');
    } 
  }
  
  $(document).ready( () => {
    $('.click-handler').on('click', () => {    
      let newNotify = $('.notify.-hidden').clone().removeClass('-hidden').appendTo('body');
      
      notifyPositionCalc(newNotify);
      setTimeout(() => {
        newNotify.remove();
        notifyPositionCalc();
      }, 15000);
    });
  });