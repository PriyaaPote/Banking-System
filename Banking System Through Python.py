#importing the requests library
import requests

#importing the random library
import random

# Function to create the account number manually
def generate_account_number():
    return str(random.randrange(1, 100))
    
# Function for user registration
def registration(name1, email1, password1, contact_no1):
    # Sending a GET request for registration
    r = requests.get(f"http://localhost/api.php?email={email1}&password={password1}&name={name1}&contact={contact_no1}")
    response = r
    # Catch the response
    catch_response(response)
    
# Function to fetch data
def fetch_data(email1, password1):
    # Sending a GET request to fetch user data
    r = requests.get(f"http://localhost/loginapi.php?email={email1}&password={password1}")
    response = r
    a = r.text
    # Parsing the response text
    email_id = a.split(".com")
    email_id1 = email_id[0] + ".com"
    remaining_txt = email_id[1].strip()
    contact_no = a[-10:]
    name = remaining_txt[:-10].strip()
    # Catch the response
    catch_response(response)
    # Generate account number
    account_no = generate_account_number()
    print("Account number is:", account_no)
    # Sending a GET request to create account with user data
    r = requests.get(f"http://localhost/priyanka.php?name={name}&account_no={account_no}&email_id={email_id1}&contact_no={contact_no}&money={current_balance}&password={password1}")
    response = r
    # Catch the response
    catch_response(response)
    
# Function to catch the response
def catch_response(response):
    if response.status_code == 404:
        print("File not found")
    elif response.status_code == 200:
        print(response.text)
        
# Function to add balance
def add_balance(account_no, new_balance):
    # Sending a GET request to add balance
    r = requests.get(f"http://localhost/update.php?account_number={account_no}&update=add&amount={new_balance1}")
    response = r
    ab = new_balance1 + " credited in your account " + account_no
    if response == ab:
        print("Account found")
    # Catch the response
    catch_response(response)
    
# Function to remove balance
def remove_balance(account_no, balance):
    # Sending a GET request to remove balance
    r = requests.get(f"http://localhost/update.php?account_number={account_no}&update=remove&amount={balance1}")
    response = r
    ab = balance1 + " debited from your account " + account_no
    if response == ab:
        print("Account found")
    # Catch the response
    catch_response(response)

# Main menu for user choices
print("Press 1 for registration:")
print("Press 2 to create account:")
print("Press 3 to add balance:")
print("Press 4 to remove balance:")
  
while True:
    # Enter the choice
    choice = input("Enter the choice:")
    
    if choice == '1':
        name1 = input("Enter the name:")
        email1 = input("Enter the email id:")
        password1 = input("Enter the password:")
        contact_no1 = input("Enter the contact number:")
        # Sending a GET request for registration
        r = requests.get(f"http://localhost/api.php?email={email1}&password={password1}&name={name1}&contact={contact_no1}")
        response = r
        if response.text == "signup done":
            print("Registration is completed")
        elif response.text == "email already exists":
            print("Please enter another email id")
        # Catch the response
        catch_response(response)
        print("\n")
    
    elif choice == '2':
        email1 = input("Enter the email id:")
        password1 = input("Enter the password:")
        current_balance = input("To create account enter the amount:")
        # Fetch user data and create account
        fetch_data(email1, password1)
        print("\n")
        
    elif choice == '3':
        account_no = input("Enter the account number:")
        new_balance = int(input("Enter the balance to add:"))
        new_balance1 = str(new_balance)
        # Add balance to the account
        add_balance(account_no, new_balance)
        print("\n")
        
    elif choice == '4':
        account_no = input("Enter the account number:")
        balance = int(input("Enter the amount to remove:"))
        balance1 = str(balance)
        # Remove balance from the account
        remove_balance(account_no, balance)
        print("\n")
    
    else:
        print("Please enter correct choice:")
        exit()
