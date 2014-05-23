<div class="page-header">
    <h1>TxtMind.us <small>Your SMS reminder service</small></h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <h3>Schedule New Reminder</h3>
        <form class="form-horizontal" role="form" id="formCreateReminder" onsubmit="return createReminder()">
            <div class="form-group" id="divDate">
                <label for="inputDate" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           name="date" id="inputDate"
                           placeholder="<?php echo date('Y-m-d',time()); ?>">
                </div>
            </div>

            <div class="form-group" id="divTime">
                <label for="inputTime" class="col-sm-2 control-label">Time</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           name="time" id="inputTime"
                           placeholder="<?php echo date('H:m',time()); ?>">
                </div>
            </div>

            <div class="form-group" id="divFrom">
                <label for="inputFrom" class="col-sm-2 control-label">From</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           name="from" id="inputFrom"
                           placeholder="12125551212">
                </div>
            </div>

            <div class="form-group" id="divTo">
                <label for="inputTo" class="col-sm-2 control-label">To</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           name="to" id="inputTo"
                           placeholder="12125551212">
                </div>
            </div>

            <div class="form-group" id="divMessage">
                <label for="inputMessage" class="col-sm-2 control-label">Message</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="inputMessage" name="message"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <button type="submit" class="btn btn-primary">Sechedule It</button>
                </div>
            </div>

        </form>
    </div>
    <div class="col-sm-4 offset1">
        <h3>Currently Scheduled</h3>
    </div>
</div>