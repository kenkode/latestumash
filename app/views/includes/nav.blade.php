
<style type="text/css">
#wrapper{
    margin-top: 0 !important;
    position: fixed;
    top: 0;
    z-index: 10000;
    border-radius: 0 0 0.5em 0.5em;
}
</style>

<style>
    .ui-autocomplete {
        max-height: 300px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
    }
    /* IE 6 doesn't support max-height
     * we use height instead, but this forces the menu to always be this tall
     */
    * html .ui-autocomplete {
        height: 300px;
    }
    </style>

<body>


    

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header"  >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" style="color:green"  href="{{ URL::to('/')}}" > {{Organization::getOrganizationName()}}</a>
            </div>
            <!-- /.navbar-header -->

        

            <ul class="nav navbar-top-links navbar-right">
         
               
                
               

                 

                <li  >
                    <a  href="{{ URL::to('dashboard')}}">
                        <i class="fa fa-home fa-fw"></i>  {{{ Lang::get('messages.nav.dashboard') }}}
                    </a>
                    
                </li>

                <li  >
                    <a  href="{{ URL::to('employees')}}">
                        <i class="fa fa-users fa-fw"></i>  {{{ Lang::get('messages.nav.employees') }}}
                    </a>
                    
                </li>


                 <li  >
                    <a  href="{{ URL::to('morgue')}}">
                        <i class="glyphicon glyphicon-plus fa-fw"></i>  {{{ Lang::get('messages.nav.morgue') }}}
                    </a>
                    
                </li>

                <li  >
                    <a  href="{{ URL::to('erpmgmt')}}">
                        <i class="glyphicon glyphicon-book fa-fw"></i>  {{{ Lang::get('messages.nav.erp') }}}
                    </a>
                    
                </li>

                <li  >
                    <a  href="{{ URL::to('other_earnings')}}">
                        <i class="glyphicon glyphicon-credit-card fa-fw"></i>  {{{ Lang::get('messages.nav.payroll') }}}
                    </a>
                    
                </li>


                <!-- <li  >
                    <a  href="{{ URL::to('leavemgmt')}}">
                        <i class="fa fa-list fa-fw"></i>  {{{ Lang::get('messages.nav.leave') }}}
                    </a>
                    
                </li> -->

<!--

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-file fa-fw"></i>  {{{ Lang::get('messages.nav.payroll_leave') }}} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">

                        <li  >
                    <a  href="{{ URL::to('payrollmgmt')}}">
                        <i class="fa fa-file fa-fw"></i>  {{{ Lang::get('messages.nav.payroll') }}}
                    </a>
                    
                </li>

                       
                        <li class="divider"></li>
                        <li  >
                    <a  href="{{ URL::to('leavemgmt')}}">
                        <i class="fa fa-list fa-fw"></i>  {{{ Lang::get('messages.nav.leave') }}}
                    </a>
                    
                </li>

                       

                        
                        
                    </ul>
                    <!-- /.dropdown-user
                </li>
                <!-- /.dropdown -->


                <!-- 

                <li  >
                    <a  href="{{ URL::to('erpmgmt')}}">
                        <i class="fa fa-tasks fa-fw"></i>  {{{ Lang::get('messages.nav.erp') }}}
                    </a>
                    
                </li>
-->

<!--

                <li  >
                    <a  href="{{ URL::to('cbsmgmt')}}">
                        <i class="fa fa-qrcode fa-fw"></i>  {{{ Lang::get('messages.nav.cbs') }}}
                    </a>
                    
                </li>

-->

                  <li  >
                    <a  href="{{ URL::to('portal')}}">
                        <i class="fa fa-user fa-fw"></i>  {{{ Lang::get('messages.nav.css') }}} 
                    </a>
                    
                </li>


                
                  <li  >
                    <a  href="{{ URL::to('reports')}}">
                        <i class="fa fa-file fa-fw"></i>  {{{ Lang::get('messages.nav.reports') }}} 
                    </a>
                    
                </li>
               

                

               <li class="dropdown" >
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-cogs fa-fw"></i>  {{{ Lang::get('messages.nav.administration') }}} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ URL::to('organizations') }}"><i class="fa fa-home fa-fw"></i>  Organization</a>
                             <li class="divider"></li>

                              <li  >
                    <a  href="{{ URL::to('accounts')}}">
                        <i class="fa fa-file fa-fw"></i>  {{{ Lang::get('messages.nav.accounting') }}} 
                    </a>
                    
                    </li>

                <li class="divider"></li>
                       
                        <li><a href="{{ URL::to('system') }}"><i class="fa fa-sign-out fa-fw"></i> System</a>
                        </li>
                        
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->




                
                

           

                



                


                <!-- /.dropdown -->
               
                <li class="dropdown" style="background-color:white;">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  {{ Confide::user()->username}} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ URL::to('users/profile/'.Confide::user()->id ) }}"><i class="fa fa-user fa-fw"></i>  Profile</a>
                        </li>

                       
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('users/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>


                       

                        
                        
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->


                <li>
                    

                        
                   <a href="{{ URL::to('users/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                   

                </li>


                
            
            </ul>
            <!-- /.navbar-top-links -->

        </nav>
        <!-- /.navbar-static-top -->
    </div>
    <br><br><br>

    <div class="row" style="float: right;margin-top: 10px !important">
  
  <div class="col-lg-12">

  <div class="form-group" style="margin:20px 0px;width: 300px">
  <div class="right-inner-addon ">
                        <i class="glyphicon glyphicon-search"></i>
                        
      <input type="text" class="form-control" id="auto1" placeholder="Search........">
      </div>
    </div>

  </div>
</div>

{{ HTML::script('js/scripts.js') }}



<script type="text/javascript">
window.prettyPrint && prettyPrint()
</script>


<script type="text/javascript">

  var data = [
    {
    label: "Account Settings",
    value: "{{URL::to('accounts')}}"},
    {
    label: "Activate Employee",
    value: "{{URL::to('deactives')}}"},
    {
    label: "Allowances",
    value: "{{URL::to('employee_allowances')}}"},
    {
    label: "Allowance Report",
    value: "{{URL::to('payrollReports/selectAllowance')}}"},
    {
    label: "Allowance Settings",
    value: "{{URL::to('allowances')}}"},
    {
    label: "Appraisals",
    value: "{{URL::to('Appraisals')}}"},
    {
    label: "Appraisal Categories",
    value: "{{URL::to('appraisalcategories')}}"},
    {
    label: "Appraisal Report",
    value: "{{URL::to('reports/Appraisals/selectPeriod')}}"},
    {
    label: "Appraisal Settings",
    value: "{{URL::to('AppraisalSettings')}}"},
    {
    label: "Banks",
    value: "{{URL::to('banks')}}"},
    {
    label: "Bank Branches",
    value: "{{URL::to('bank_branch')}}"},
    {
    label: "Benefit Settings",
    value: "{{URL::to('benefitsettings')}}"},
    {
    label: "Branches",
    value: "{{URL::to('branches')}}"},
    {
    label: "Citizenship",
    value: "{{URL::to('citizenships')}}"},
    {
    label: "Company Property",
    value: "{{URL::to('Properties')}}"},
    {
    label: "Company Property Report",
    value: "{{URL::to('reports/CompanyProperty/selectPeriod')}}"},
    {
    label: "Contract Reminders",
    value: "{{URL::to('reminderview')}}"},
    {
    label: "Dashboard",
    value: "{{URL::to('dashboard')}}"},
    {
    label: "Data Migration",
    value: "{{URL::to('migrate')}}"},
    {
    label: "Deductions",
    value: "{{URL::to('employee_deductions')}}"},
    {
    label: "Deduction Report",
    value: "{{URL::to('payrollReports/selectDeduction')}}"},
    {
    label: "Deduction Settings",
    value: "{{URL::to('deductions')}}"},
    {
    label: "Departments",
    value: "{{URL::to('departments')}}"},
    {
    label: "Document Reminders",
    value: "{{URL::to('reminderdoc/indexdoc')}}"},
    {
    label: "Earnings",
    value: "{{URL::to('other_earnings')}}"},
    {
    label: "Earning Report",
    value: "{{URL::to('payrollReports/selectEarning')}}"},
    {
    label: "Earning Settings",
    value: "{{URL::to('earningsettings')}}"},
    {
    label: "Email Payslip",
    value: "{{URL::to('email/payslip')}}"},
    {
    label: "Employees",
    value: "{{URL::to('employees')}}"},
    {
    label: "Employee Detail Form",
    value: "{{URL::to('public/uploads/employees/documents/umash appointment letter.docx')}}"},
    {
    label: "Employee List Report",
    value: "{{URL::to('reports/selectEmployeeStatus')}}"},
    {
    label: "Employees on Leave",
    value: "{{URL::to('leaveReports/selectLeaveType')}}"},
    {
    label: "Employee Type",
    value: "{{URL::to('employee_type')}}"},
    {
    label: "Holiday Management",
    value: "{{URL::to('holidays')}}"},
    {
    label: "Individual Employee Report",
    value: "{{URL::to('employee/select')}}"},
    {
    label: "Individual Employee On Leave",
    value: "{{URL::to('leaveReports/selectEmployee')}}"},
    {
    label: "Itax Template",
    value: "{{URL::to('itax/download')}}"},
    {
    label: "Job Groups",
    value: "{{URL::to('job_group')}}"},
    {
    label: "Leave Applications",
    value: "{{URL::to('leavemgmt')}}"},
    {
    label: "Leave Application Report",
    value: "{{URL::to('leaveReports/selectApplicationPeriod')}}"},
    {
    label: "Leave Amended",
    value: "{{URL::to('leaveamends')}}"},
    {
    label: "Leave Approved",
    value: "{{URL::to('leaveapprovals')}}"},
    {
    label: "Leaves Approved Report",
    value: "{{URL::to('leaveReports/selectApprovedPeriod')}}"},
    {
    label: "Leaves Balances Report",
    value: "{{URL::to('leaveReports/selectLeave')}}"},
    {
    label: "Leave Rejected",
    value: "{{URL::to('leaveReports/selectRejectedPeriod')}}"},
    {
    label: "Leaves Rejected Report",
    value: "{{URL::to('leaveReports/selectRejectedPeriod')}}"},
    {
    label: "Next of Kin Report",
    value: "{{URL::to('reports/nextofkin/selectEmployee')}}"},
    {
    label: "NHIF Returns",
    value: "{{URL::to('payrollReports/selectNhifPeriod')}}"},
    {
    label: "NHIF Settings",
    value: "{{URL::to('nhif')}}"},
    {
    label: "Non Taxable Income",
    value: "{{URL::to('employeenontaxables')}}"},
    {
    label: "Non Taxable Income Report",
    value: "{{URL::to('payrollReports/selectnontaxableincome')}}"},
    {
    label: "Non Taxable Income Settings",
    value: "{{URL::to('nontaxables')}}"},
    {
    label: "NSSF Returns",
    value: "{{URL::to('payrollReports/selectNssfPeriod')}}"},
    {
    label: "NSSF Settings",
    value: "{{URL::to('nssf')}}"},
    {
    label: "Occurences",
    value: "{{URL::to('occurences')}}"},
    {
    label: "Occurence Report",
    value: "{{URL::to('reports/selectEmployeeOccurence')}}"},
    {
    label: "Occurence Settings",
    value: "{{URL::to('occurencesettings')}}"},
    {
    label: "Organization Settings",
    value: "{{URL::to('organizations')}}"},
    {
    label: "Overtimes",
    value: "{{URL::to('overtimes')}}"},
    {
    label: "Overtime Report",
    value: "{{URL::to('payrollReports/selectOvertime')}}"},
    {
    label: "PAYE Returns",
    value: "{{URL::to('payrollReports/selectPayePeriod')}}"},
    {
    label: "Payroll Calculator",
    value: "{{URL::to('payrollcalculator')}}"},
    {
    label: "Payroll Remittance",
    value: "{{URL::to('payrollReports/selectRemittancePeriod')}}"},
    {
    label: "Payroll Summary",
    value: "{{URL::to('payrollReports/selectSummaryPeriod')}}"},
    {
    label: "Payslips",
    value: "{{URL::to('payrollReports/selectPeriod')}}"},
    {
    label: "Portal",
    value: "{{URL::to('portal')}}"},
    {
    label: "Profile",
    value: "{{URL::to('users/profile/1')}}"},
    {
    label: "Process Advance Salaries",
    value: "{{URL::to('advance')}}"},
    {
    label: "Process Payroll",
    value: "{{URL::to('payroll')}}"},
    {
    label: "Relief",
    value: "{{URL::to('employee_relief')}}"},
    {
    label: "Relief Report",
    value: "{{URL::to('payrollReports/selectRelief')}}"},
    {
    label: "Relief Settings",
    value: "{{URL::to('reliefs')}}"},
    {
    label: "Salary Advance Summary Report",
    value: "{{URL::to('advanceReports/selectSummaryPeriod')}}"},
    {
    label: "Salary Advance Remittance Report",
    value: "{{URL::to('advanceReports/selectRemittancePeriod')}}"},
    {
    label: "System Settings",
    value: "{{URL::to('system')}}"},
    ];

    $(function() {
      
      $("#auto1").autocomplete({
        source: data,
        focus: function(event, ui) {
          // prevent autocomplete from updating the textbox
          event.preventDefault();
          // manually update the textbox
          $(this).val(ui.item.label);
        },
        select: function(event, ui) {
          // prevent autocomplete from updating the textbox
          event.preventDefault();
          // manually update the textbox and hidden field
          window.location.href = ui.item.value;
          $(this).val(ui.item.label);
        }
      });
    });
</script>