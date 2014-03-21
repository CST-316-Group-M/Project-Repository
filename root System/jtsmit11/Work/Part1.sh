#Course Id: CST 383
#Team Identification: Group 7
#Team Members:
#Member 1 full name: Jordan Smith
#Member 2 full name: Easton Akers 
#Member 3 full name: Brian McGraw
#Project Deliverable: Assignment 3 (Team Project I): Group7_Part_1_2

###########################################################
#Part 1 of Assignment 3
echo "Present-Day Performance Data";
declare -a curves
curves[0]="gge0007x"
curves[1]="gge0007y"
curves[2]="gge0007z"
echo "Curve Name ${curves[*]}"
declare -a dateMeas
dateMeas[0]=2/2/2007
dateMeas[1]=2/2/2007
dateMeas[2]=2/2/2007
echo "Date ${dateMeas[*]}"
declare -a timeMeas
timeMeas[0]=9:43
timeMeas[1]=9:44
timeMeas[2]=9:44
echo "Time ${timeMeas[*]}"
declare -a Tamb
Tamb[0]=10
Tamb[1]=9.0
Tamb[2]=9.2
echo "Tamb(C) ${Tamb[*]}"
declare -a Tref
Tref[0]=21.7
Tref[1]=21.7
Tref[2]=22.0
echo "Tref(C) ${Tref[*]}"
declare -a Tm
Tm[0]=21.7 
Tm[1]=23.7
Tm[2]=24.7
echo "Tm(C) ${Tm[*]}"
declare -a irradiance
irradiance[0]=927.8
irradiance[1]=933.7
irradiance[2]=932.3
echo "Irradiance(W/m^2) ${irradiance[*]}"
declare -a Isc
Isc[0]=7.73
Isc[1]=7.78
Isc[2]=7.79
echo "Isc(A) ${Isc[*]}"
declare -a Voc
Voc[0]=37.19
Voc[1]=36.83
Voc[2]=36.75
echo "Voc(V) ${Voc[*]}"
declare -a Imp
Imp[0]=6.97
Imp[1]=7.00
Imp[2]=7.00
echo "Imp(A) ${Imp[*]}"
declare -a Vmp
Vmp[0]=28.48
Vmp[1]=28.20
Vmp[2]=27.98
echo "Vmp(V) ${Vmp[*]}"
declare -a Pm
Pm[0]=198.34
Pm[1]=197.39
Pm[2]=195.96
echo "Pm(W) ${Pm[*]}"
declare -a FF
FF[0]=69.0
FF[1]=68.9
FF[2]=68.4
echo "FF(%) ${FF[*]}"
#######################################################################
#Part 2 of Assignment 3

stcIrradiance()
{
STCresult=`echo "(${irradiance[0]}*$CFref)/(($CFref+$TCref)*($Tref-25))" | bc -l`
}

echo "Enter the reference cell characteristic (CFref and TCref) separated by a space: ";read CFref TCref
echo "Calibration Factor: "$CFref 
echo "Temperature Coefficient: "$TCref

echo "Temperature coefficient for voltage: ";read v1
echo "Temperature coefficient for maximum: ";read v2
echo "Temperature coefficient for FF: ";read f
echo "Temperature coefficient for power: ";read p
echo $v1, $v2, $f, $p

########################################################################
#main script


stcIrradiance  CFref TCref Tref
echo $STCresult

