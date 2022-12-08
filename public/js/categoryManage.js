function cancelChangeCategory() {
    $('[rel="changeCategory"]').hide();
    $('#changeCategoryButton').show();
    $('#changeCategoryInput').val('');
    $('#changeCategoryInput').hide();
    $('#changeCategoryApply').hide();
}

function changeCategory() {
    $('[rel="changeCategory"]').show();
    $('#changeCategoryButton').hide();
    $('#changeCategoryInput').val($('#category option:selected').text())
}

function CategoryChanged(id, name) {
    $('[rel="changeCategory"]').hide();
    $('#changeCategoryButton').show();
    $('#changeCategoryInput').val('');
    $("#category option[value=" + id + "]").remove();
    $('#category').append(new Option(name, id));
    $('#category').val(id).change();
}

function newCategory() {
    $('[rel="newCategory"]').show();
    $('#newCategoryButton').hide();
}

function newCategoryInserted(id, name) {
    $('[rel="newCategory"]').hide();
    $('#newCategoryButton').show();
    $('#newCategoryInput').val('');
    $('#category').append(new Option(name, id));
    $('#category').val(id).change();
}
