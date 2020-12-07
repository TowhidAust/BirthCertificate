@include('frontend.header')

    <section class="mainContents">

      @include('frontend.navbar')

        <div class="sidebarAndContents container mt-3">

            <form action="POST">
                <div class="mt-3 birthInfoCheck">
                  <h3>জন্ম তথ্য যাচাই</h3>
                   <p>Enter the birth registration number and the date of birth of the person.</p>

                   <div class="row">
                   <div class="col-md-6">
                   <label for=""> Birth Registration Number </label>
                    <input class="form-control" type="text">

                    <label class="mt-3" for=""> Date of Birth </label>
                    <input class="form-control" type="date">
                   </div>
                   <div class="col-md-6">
                      <h3>Output</h3>
                   </div>
                   </div>
                    
                </div>
            </form>
        </div>
    </section>
@include('frontend.footer')
