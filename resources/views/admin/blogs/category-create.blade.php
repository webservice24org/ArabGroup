<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="categoryModalLabel">{{__('Add Blog category')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="category-form">
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
        <button onclick="saveCategory()" id="save-btn" class="btn btn-primary">{{__('Save Category')}}</button>
      </div>
    </div>
  </div>
</div>


<script>
    async function saveCategory() {
        const categoryName = document.getElementById('categoryName').value;

        if (!categoryName) {
            alert("Category Name is Required!");
            return;
        }

        try{
            showLoader();
            closeModal('categoryModal');
            const response = await axios.post("/blogs", {
                category_name: categoryName
            });

            if (response.status === 201) {
                document.getElementById("category-form").reset();
               //await getList(currentPage);
            }else{
                alert("Rquest Faild!");
            }
        } catch (error){
            console.error("Error Creating Category", error);
            alert("An error occurred while saving Category Name.");
        }finally{
            hideLoader();
        }
    }
</script>