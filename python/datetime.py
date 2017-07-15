""" This Is the Next Date Calculator on the basis of Date entered by the user.
    **Undertaken on Wed Mar 1 2017 and Completed on the same date.**
    **Coded By Anshuman Upadhyay(BTECH:CSE(A-09(131500047)))**
    **Submitted To Asst Prof Jitesh Bhatia on Mar 1 2017**
    **No Improvisations done on suggestion since the genesis**
"""
import calendar
print "\n*********************Next-Date Calculator************************"
print "\nSelect Date format\n"
print "1 : DD/MM/YYYY\n2 : MM/DD/YYYY \n"
input_form = input();  #raw_input doesn't works here, give input so that it can be checked by the if block
print "\nEnter the Date : "
date_input = raw_input()
if(input_form == 1):
    try:
        day = int(date_input[0:2])
        month = int(date_input[3:5])
        year = int(date_input[6:10])
    except ValueError:
        print "\nThe Literals are faulty, Enter it in DD/MM/YYYY Format Please!!"
        exit()
    else:
        input_form_is_1 = True;

elif(input_form == 2):
    try:
        month = int(date_input[0:2])
        day = int(date_input[3:5])
        year = int(date_input[6:10])
    except ValueError:
        print "\nThe Literals are faulty, Enter it in MM/DD/YYYY Format Please!!"
        exit()
    else:
        input_form_is_1 = False
try:
    cal = calendar.month(year, month)
except IndexError:
    print "\nThe Date You entered is incorrect"
    exit()
else:
    no_of_days_tuple = calendar.monthrange(year, month) # A tuple whose 2nd value is the number of days the given month':Both values are of type int
    no_of_days = no_of_days_tuple[1]
    if(day >= no_of_days + 1):
        print "Day Is out of range, Aborting!!"
        exit()
    #Incrementing the date in the following code _segment
    day += 1
    if(day > no_of_days):
        month += 1
        day = 1
        if(month > 12):
            year += 1
            month = 1
    # Formatting of the The output of the date is done in the following code segment
    if(input_form_is_1):
        if(day <= 9 and month <= 9):
            print "Next Permissible Date :  0"+str(day)+"/0"+str(month)+"/"+str(year)
        elif(day <= 9 and month > 9):
            print " Next Permissible Date :  0"+str(day)+"/"+str(month)+"/"+str(year)
        elif(day > 9 and month <= 9):
            print " Next Permissible Date :  "+str(day)+"/0"+str(month)+"/"+str(year)
    else:
        if(day <= 9 and month <= 9):
            print " Next Permissible Date : 0"+str(month)+"/0"+str(day)+"/"+str(year)
        elif(day <= 9 and month > 9):
            print " Next Permissible Date : 0"+str(month)+"/"+str(day)+"/"+str(year)
        elif(day > 9 and month <= 9):
            print " Next Permissible Date : "+str(month)+"/0"+str(day)+"/"+str(year)
