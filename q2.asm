
; Assignment 8 q2

MVI B,0AH	; Counter
LXI D,3000H	; Source pointer
LXI H,0000H	; Sum Register
LOOP:	CALL BCD2BIN
	MOV C,A
	MOV A,B
	MVI B,00H
	DAD B		; Adding the binary equivivalent of BCD
	INX D
	MOV B,A
	DCR B
	JNZ LOOP
	SHLD 3010H	; Storing Answer
HLT


; Input D - Source Pointer for Packed BCD
; Output A - Binary equivivalent of BCD
BCD2BIN:	PUSH B
		PUSH H
		LDAX D
		ANI 0FH		; Unpacking BCD
		MOV B,A
		LDAX D
		ANI 0F0H
		RRC
		RRC
		RRC
		RRC
		MOV H,A
		MVI C,09H
MUL10:		ADD H		; A * 10 + B
		DCR C
		JNZ MUL10
		ADD B
		POP H
		POP B
		RET