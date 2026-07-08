<?xml version="1.0"?>
<?mso-application progid="Excel.Sheet"?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:o="urn:schemas-microsoft-com:office:office"
 xmlns:x="urn:schemas-microsoft-com:office:excel"
 xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:html="http://www.w3.org/TR/REC-html40">
 <Styles>
  <Style ss:ID="Default" ss:Name="Normal">
   <Alignment ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="11" ss:Color="#000000"/>
   <Interior/>
   <NumberFormat/>
   <Protection/>
  </Style>
  <Style ss:ID="sHeader">
   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="11" ss:Color="#FFFFFF" ss:Bold="1"/>
   <Interior ss:Color="#4F46E5" ss:Pattern="Solid"/>
  </Style>
  <Style ss:ID="sTitle">
   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
   <Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="16" ss:Color="#000000" ss:Bold="1"/>
  </Style>
  <Style ss:ID="sCell">
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
  </Style>
 </Styles>

 {{-- Sheet 1: All Employees --}}
 <Worksheet ss:Name="All Records">
  <Table ss:ExpandedColumnCount="5" x:FullColumns="1" x:FullRows="1" ss:DefaultRowHeight="15">
   <Column ss:AutoFitWidth="0" ss:Width="40"/>
   <Column ss:AutoFitWidth="0" ss:Width="100"/>
   <Column ss:AutoFitWidth="0" ss:Width="80"/>
   <Column ss:AutoFitWidth="0" ss:Width="120"/>
   <Column ss:AutoFitWidth="0" ss:Width="200"/>
   
   <Row ss:AutoFitHeight="0" ss:Height="25">
    <Cell ss:MergeAcross="4" ss:StyleID="sTitle"><Data ss:Type="String">Monthly Attendance Report - All Records</Data></Cell>
   </Row>
   <Row>
    <Cell ss:MergeAcross="4"><Data ss:Type="String">Cycle: {{ $reportStart->format('d M Y') }} to {{ $reportEnd->format('d M Y') }}</Data></Cell>
   </Row>
   <Row ss:Index="4" ss:StyleID="sHeader">
    <Cell><Data ss:Type="String">#</Data></Cell>
    <Cell><Data ss:Type="String">Date</Data></Cell>
    <Cell><Data ss:Type="String">Time</Data></Cell>
    <Cell><Data ss:Type="String">Code</Data></Cell>
    <Cell><Data ss:Type="String">Employee Name</Data></Cell>
   </Row>
   
   @foreach($allRecords as $index => $record)
   <Row ss:StyleID="sCell">
    <Cell><Data ss:Type="Number">{{ $index + 1 }}</Data></Cell>
    <Cell><Data ss:Type="String">{{ \Carbon\Carbon::parse($record->scan_date)->format('d-m-Y') }}</Data></Cell>
    <Cell><Data ss:Type="String">{{ $record->scan_time }}</Data></Cell>
    <Cell><Data ss:Type="String">{{ $record->employee_code }}</Data></Cell>
    <Cell><Data ss:Type="String">{{ $record->employee_name }}</Data></Cell>
   </Row>
   @endforeach
  </Table>
 </Worksheet>

 {{-- Individual Sheets for each Employee --}}
 @foreach($employeeGroups as $code => $records)
 @php
    $sheetName = preg_replace('/[*?:\\\\\/\[\]]/', '', $records->first()->employee_name);
    $sheetName = substr($sheetName, 0, 30);
 @endphp
 <Worksheet ss:Name="{{ $sheetName }}">
  <Table ss:ExpandedColumnCount="4" x:FullColumns="1" x:FullRows="1" ss:DefaultRowHeight="15">
   <Column ss:AutoFitWidth="0" ss:Width="40"/>
   <Column ss:AutoFitWidth="0" ss:Width="100"/>
   <Column ss:AutoFitWidth="0" ss:Width="80"/>
   <Column ss:AutoFitWidth="0" ss:Width="120"/>

   <Row ss:AutoFitHeight="0" ss:Height="25">
    <Cell ss:MergeAcross="3" ss:StyleID="sTitle"><Data ss:Type="String">Employee Attendance: {{ $records->first()->employee_name }}</Data></Cell>
   </Row>
   <Row>
    <Cell ss:MergeAcross="3"><Data ss:Type="String">Code: {{ $code }} | Cycle: {{ $reportStart->format('d M Y') }} to {{ $reportEnd->format('d M Y') }}</Data></Cell>
   </Row>
   
   <Row ss:Index="4" ss:StyleID="sHeader">
    <Cell><Data ss:Type="String">#</Data></Cell>
    <Cell><Data ss:Type="String">Date</Data></Cell>
    <Cell><Data ss:Type="String">Time</Data></Cell>
    <Cell><Data ss:Type="String">Status</Data></Cell>
   </Row>

   @foreach($records as $index => $record)
   <Row ss:StyleID="sCell">
    <Cell><Data ss:Type="Number">{{ $index + 1 }}</Data></Cell>
    <Cell><Data ss:Type="String">{{ \Carbon\Carbon::parse($record->scan_date)->format('d-m-Y') }}</Data></Cell>
    <Cell><Data ss:Type="String">{{ $record->scan_time }}</Data></Cell>
    <Cell><Data ss:Type="String">Present</Data></Cell>
   </Row>
   @endforeach
  </Table>
 </Worksheet>
 @endforeach

</Workbook>
