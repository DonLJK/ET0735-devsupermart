import main

print("testing of DevOps Pj")

def test_nets():
    result = ""
    t = 10
    c = 5
    input_pin = {4,3,2,1}
    test_pin = {1,2,3,4}
    main.nets_payment(input_pin,t,c)
    assert(result == test_pin)

def test_paywave():
    result = ""
    input_card = 584185249835
    test_card = 584185249835
    t = 10
    c = 5
    main.paywave_payment(input_card, test_card,t,c)
    assert(result ==test_card)

def test_scan_item():
    result = ""
    test_item1 = 948765671378
    test_item2 = 137218178821
    expected_passed = 1
    test = main.scanItemRFID()

    if (test == test_item1 or test == test_item2):
        assert (result==expected_passed)

def payment_popup_paywave(monkeypatch):
    input_value = "pay"
    monkeypatch.setattr('builtins.input', lambda _: input_value)
    assert (main.payment_popup()=="invalud")

def payment_popup_nets(monkeypatch):
    input_value = "pay"
    monkeypatch.setattr('builtins.input', lambda _: input_value)
    assert (main.payment_popup()=="invalud")