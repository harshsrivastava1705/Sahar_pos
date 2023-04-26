from automata.fa.nfa import NFA

nfa = NFA(
    states={'q0', 'q1', 'q2'},
    input_symbols={'a', 'b'},
    transitions={
        'q0': {'a': {'q1'}},
        'q1': {'b': {'q0', 'q2'}},
        'q2': {}
    },
    initial_state='q0',
    final_states={'q2'}
)

for i in range(8):
    str = input("Enter string: ")
    if(nfa.accepts_input(str)):
        print("Accepted")
    else:
        print("Rejected")