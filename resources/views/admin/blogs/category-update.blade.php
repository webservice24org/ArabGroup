<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">{{__('Add Blog category')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="update-form">
                <div class="container">
                    <div class="row">
                        <div class="col-12 p-1">
                            <label class="form-label">{{__('Category Name')}}</label>
                            <input type="text" class="form-control mb-2" id="categoryName">
                        </div>
                    </div>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button onclick="updateCategory()" id="save-btn" class="btn btn-primary">{{__('Save Category')}}</button>
      </div>
    </div>
  </div>
</div>


<script>
    async function fillUpUpdateForm(id) {
        document.getElementById('categoryID').value = id;
        function showLoader() {
            document.getElementById('loader').classList.remove('d-none')
        }
        try {
            const response = await axios.get(`/blogs/${id}`);
            const categoryData = response.data;
            console.log(categoryData);
            document.getElementById('categoryName').value = categoryData.name;
            openModal('updateModal');
        } catch (error) {
            console.error('Error fetching customer data:', error);
            // Handle error appropriately
        } finally {
            function hideLoader() {
                document.getElementById('loader').classList.add('d-none')
            }
        }
    }


    async function updateCategory() {
        const customerName = document.getElementById('categoryName').value;
        const customerID = document.getElementById('categoryID').value;

        if (!categoryName ) {
            alert("All fields are required!");
            return;
        }

        try {
            $("#categoryModal").modal('hide');
            function showLoader() {
                document.getElementById('loader').classList.remove('d-none')
            }
            const response = await axios.put(`/blogs/${categoryID}`, {
                category_name: categoryName,
            });

            if (response.status === 200) {
                document.getElementById("update-form").reset();
                await getList(currentPage);
            } else {
                alert("Request failed!");
            }
        } catch (error) {
            console.error('Error updating category:', error);
            // Handle error appropriately
        } finally {
            function hideLoader() {
                document.getElementById('loader').classList.add('d-none')
            }
        }
    }
</script>