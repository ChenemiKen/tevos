<div class="flex-container">
  <div id="sidebar" class="collapse show">
      <div class="sidenav-item">
          <a href="{% url 'amapp:register_dashboard' request.session.register_id %}">
              <div class="sidenav-active my-4">
                  <i class="fas fa-tachometer-alt"></i>
                  <h6>Dashboard</h6>
              </div>
          </a>
      </div>
      <div class="sidenav-item my-4">
          <a href="{% url 'amapp:my_sessions' request.session.register_id %}">
              <div>
                  <i class="fas fa-calendar-alt"></i>
                  <h6>Sessions</h6>
              </div>
          </a>
      </div>
  </div>
  <div id="workspace">
      <div class="row">
          <div class="col-6">
              <h2>{{register.name}}</h2>
              <h6>Register Id:&nbsp;<span class="blue">{{register.reg_id}}</span></h6>
          </div>
          <div class="col-6 my-sm-4">
              <button class="btn btn-primary float-right mx-sm-4" data-toggle="modal" data-target="#exampleModalCenter">Start a session&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
          </div>
      </div>
      <div class="sessions-card card">
          <h1>{{session_count}}</h1>
          <h6>Sessions</h6>
      </div>  
      <div>
        <h6 class="buttonlike col-xl-3 col-md-5 col-sm-6 mt-5">Active sessions <span class="red">. . .</span></h6>
    </div>
    <table class="table table-hover table-responsive-sm">
        <caption>List of currently active sessions</caption>
        <thead>
            <tr>
                <th scope="col">s/n</th>
                <th scope="col">Register</th>
                <th scope="col">Rgstr Id</th>
                <th scope="col">Start</th>
                <th scope="col">End</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>CPE 547</td>
                <td>rhgnt50403</td>
                <td>10:05 AM</td>
                <td>01:00 PM</td>
                <td><a href="#">View</a></td>
                <td><a href="#" class="red">End</a></td>
            </tr>          
            <tr>
                <th scope="row">2</th>
                <td>CPE 547</td>
                <td>rhgnt50403</td>
                <td>10:05 AM</td>
                <td>01:00 PM</td>
                <td><a href="#">View</a></td>
                <td><a href="#" class="red">End</a></td>
            </tr> 
      
                        
        </tbody>
    </table>
  </div> 
</div>
<!-- <nav class="sidebar text-center">
  <ul class="sidebar-list">
    <li class="">
      <a href="{% url 'amapp:register_dashboard' request.session.register_id %}"class="text-center">
        <i class="fas fa-tachometer-alt"></i>
        <h6>Dashboard</h6>
      </a>
    </li>
  </ul>
</nav> -->

