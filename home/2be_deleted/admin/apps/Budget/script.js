$('.custom-sidebar-heading .custom-side-head').click(function(){
	$(this).parent('.accordion-head').toggleClass('open');
	$(this).parent('.accordion-head').siblings('.accordion-content').slideToggle();
});
$('.table tbody td .option > div.cm-edit').click(function(){
  $('.input-data-toggle-form').remove();
	$(this).closest('.table-body').append(`
		<div class="input-data-toggle-form">
            <div class="toggle-heading">Edit data</div>
            <div class="toggle-input-data">
                <input class="name" value="Property taxes">
                <input class="money" value="300">
            </div>
            <div class="cm-varable-button-toggle clearfix">
                <div class="button-toggle-heading">Fixed</div>
                <div class="button-toggle">
                    <div class="toggle-switch">
                        <input type="checkbox">
                        <label></label>
                    </div>
                </div>
            </div>
			<div class="toggle-save-cancel-button clearfix">
                    <button class="btn-save-toggle btn-s">Cancel</button>
                    <button class="btn-save-toggle btn-c">Save</button>
                </div>
		</div>
	`);
});

$(document).on('click','.btn-s',function(){
  $('.input-data-toggle-form').remove();
});