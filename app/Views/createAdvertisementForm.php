    <br>
    <form class="form-group text-left w-50 p-3 col-6 card bg-light mb-3 rounded mx-auto d-block " method="post" action="/property/advertisement/createAdvertisement">
        <h2>Create new advertisement</h2>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" name="title" placeholder="Title of property" required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" class="form-control" name="location" placeholder="Enter property location " required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" class="form-control" name="address" placeholder="Enter property address" required >
        </div>
        <div class="form-group">
            <label for="typProperty">type property</label>
            <select name="typProperty" id="typProperty">
                <option value="House">House</option>
                <option value="Flat">Flat</option>
                <option value="Land">Land</option>
            </select>
        </div>
        <div class="form-group">
            <label for="area">Area</label>
            <input type="text" id="area" class="form-control" name="area" placeholder="Enter area in m2" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" id="contact" class="form-control" name="contact" placeholder="Enter mobile number or email" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" id="price" class="form-control" name="price" placeholder="Enter sell price" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" cols="72" rows="3" placeholder="Describe property"></textarea>
        </div>
        <input type="submit" class="btn btn-info" name="createAdvertisement" value="create">
        <a href="/property/advertisement/show" class="btn btn-info" role="button">cancel</a>
        <br><br>
    </form>
