/**
 * inputSortBy: element (eg: hidden input in form) hold value (eg: name.asc) of sort
 * sortKeyDirDelimiter: (eg: name.asc => .)
 * onChangeSort: callback when change sort value (eg: submit form with new value)
 */
function sortTable(inputSortBy, sortKeyDirDelimiter, onChangeSort) {
    var sortAscClass = 'sort-asc';
    var sortDescClass = 'sort-desc';

    var inputSortByVal = inputSortBy.val().split(sortKeyDirDelimiter);

    var useDefaultSort = true;
    $('.sortable').each(function (index) {
        var el = $(this);
        var sortName = el.data('sort-name');

        if (inputSortByVal && inputSortByVal[0] == sortName) {
            el.addClass('sort-' + inputSortByVal[1]);
            useDefaultSort = false;

            return false;
        }
    });

    if (useDefaultSort) {
        $('.default-sort').first().addClass(sortAscClass);
    }

    var changeSort = function (el, curentSort, newSort, sortName) {
        $('.' + curentSort).removeClass(curentSort);
        el.removeClass(curentSort);
        el.addClass(newSort);
        if (newSort == sortAscClass) {
            inputSortBy.val(sortName + sortKeyDirDelimiter + 'asc');
        } else {
            inputSortBy.val(sortName + sortKeyDirDelimiter + 'desc');
        }

        onChangeSort();
    }

    $('.sortable').click(function() {
        var el = $(this);
        var sortName = el.data('sort-name');

        if (el.hasClass(sortAscClass)) {
            changeSort(el, sortAscClass, sortDescClass, sortName);
        } else {
            changeSort(el, sortDescClass, sortAscClass, sortName);
        }
    });
}

$(document).ready(function () {
    var form = $('.filter-sort-form');
    var inputSortBy = form.find('[name="sortBy"]');

    function submitForm() {
        form.submit();
    }

    $('#per-page').change(function() {
        form.find('[name="perPage"]').val($(this).val());
        submitForm();
    });

    if (typeof inputSortBy.val() != 'undefined') {
        sortTable(inputSortBy, '.', submitForm);
    }
});
