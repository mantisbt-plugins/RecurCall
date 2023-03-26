# RecurrCall
This plugin incorporates recurring "calls" into Mantis.
The field "severity" is renamed to "Call Type" and in addition to the existing definition, 6 types are added :
74:Daily Recurring task
75:Weekly Recurring task
76:Monthly Recurring task
77:Quarterly Recurring task
78:Half-yearly Recurring task
79:Yearly Recurring task
If a call (issue) in the system reaches a predefined Status (default: resolved), 
it creates a new call, again with a predefined status(default: assigned).
It then sets a new duedate based upon call type, ie type=76, it adds one month to the duedate. 
It does work only with the standard working days which means that a month is defined as 22 working days.
