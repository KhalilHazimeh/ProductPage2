<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="../../assets/js/app.js?v={{ time() }}"></script>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/all.min.js"></script>
<script src="../../assets/js/bootstrap.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    // Set the value of delete_product_id when the modal is opened
    $('#deleteEmployeeModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var productId = button.data('id');
        $('#delete_product_id').val(productId);
    });
</script>

<script>
    $(document).ready(function () {
        $(".nav-link.active").click()
        var selectedOptions = [];
        var selectElements = {};
        selectedOptions = $('input[name="product_options[]"]:checked');
        var combinationsTable = $('#combinationsTable');
        var tableHead = combinationsTable.find('thead');
        var tableBody = combinationsTable.find('tbody');

        function loadOptionValues(optionID, callback) {
            if (selectElements[optionID]) {
                callback(selectElements[optionID]);
            } else {
                $.ajax({
                    url: '{{ route("fetchOptionValues") }}',
                    method: 'POST',
                    data: { optionID: optionID, _token: '{{ csrf_token() }}'},
                    dataType: 'json',
                    success: function (response) {
                        var selectElementGenerated = generateSelectElement(response, optionID);
                        selectElements[optionID] = selectElementGenerated;
                        callback(selectElementGenerated);
                        console.log('Response:', response);
                    },
                    error: function(xhr, status, error) {
                        console.error('XHR:', xhr);
                        console.error('Status:', status);
                        console.error('Error:', error);
                    }
                });
            }
        }

        function generateSelectElement(response, optionID) {
            var selectElement = '<select class="form-control" name="combinations['+optionID+'][]" id="selectOptionValues-' + optionID + '">';
            $.each(response, function (index, optionValue) {
                var optionElement = '<option value="' + optionValue.id + '">' + optionValue.value_name + '</option>';
                selectElement += optionElement;
            });
            selectElement += '</select>';
            return selectElement;
        }

        function updateCombinationsTable() {
            selectedOptions = $('input[name="product_options[]"]:checked');
            var combinationsTable = $('#combinationsTable');
            var tableHead = combinationsTable.find('thead');
            var tableBody = combinationsTable.find('tbody');

            tableHead.empty();
            tableBody.empty();

            if (selectedOptions.length > 0) {
                selectedOptions.each(function () {
                    var optionID = $(this).val();
                    var optionName = $(this).closest('label').text().trim();
                    tableHead.append('<th>' + optionName + '</th>');
                });

                tableHead.append('<th>Action</th>');

                if (selectedOptions.length > 0) {
                    var newRow = '<tr>';
                    selectedOptions.each(function () {
                        var optionID = $(this).val();
                        loadOptionValues(optionID, function (selectHTML) {
                            newRow += '<td>' + selectHTML + '</td>';
                            if (newRow.split('<td>').length - 1 === selectedOptions.length) {
                                newRow += '<td><button class="btn btn-success add-row"><i class="fa fa-plus"></i></button></td>';
                                newRow += '</tr>';
                                tableBody.append(newRow);
                            }
                        });
                    });
                }
            }
        }
        tableBody.on('click', '.add-row', function () {
            var newRow = '<tr>';
            var promises = [];

            selectedOptions.each(function () {
                var optionID = $(this).val();
                var promise = new Promise(function (resolve) {
                    loadOptionValues(optionID, function (selectHTML) {
                        newRow += '<td>' + selectHTML + '</td>';
                        resolve();
                    });
                });
                promises.push(promise);
            });

            Promise.all(promises).then(function () {
                newRow += '<td><button class="btn btn-danger remove-row"><i class="fa fa-minus"></i></button></td>';
                newRow += '</tr>';
                tableBody.append(newRow);
            });

            return false;
        });


        tableBody.on('click', '.remove-row', function () {
            $(this).closest('tr').remove();
        });

        $('input[name="product_options[]"]').change(function () {
            updateCombinationsTable();
        });
    });
    </script>
