# Matrix Analysis 


```python
# ID: 0432310005101001
d1 = 1  # last digit of my student ID
d2 = 0  # second last digit of my student ID
```

* `d1` and `d2` are integer values extracted from the student ID.
* These values are later used to construct matrix elements dynamically.

---

## 3. Creating Matrix A

```python
A = np.array([[d1+2, d2+1], [2*d1, d2+2]])
print(A)
```

### Value Substitution

* `d1 + 2 = 1 + 2 = 3`
* `d2 + 1 = 0 + 1 = 1`
* `2 × d1 = 2`
* `d2 + 2 = 2`

### Matrix A

$$
A = \begin{bmatrix}
3 & 1 \\
2 & 2
\end{bmatrix}
$$


### Output

```
[[3 1]
 [2 2]]
```

---

## 4. Shape of Matrix A

```python
size_A = A.shape
print("\nSize of A: ", size_A)
```

* `.shape` returns `(number_of_rows, number_of_columns)`.

### Output

```
Size of A:  (2, 2)
```

---

## 5. Determinant of Matrix A

```python
det_A = np.linalg.det(A)
print("\nDeterminant of A: ", det_A)
```

### Determinant Formula (2×2)

$$
\det(A) = (3 \times 2) - (1 \times 2) = 6 - 2 = 4
$$


### Output

```
Determinant of A:  4.000000000000001
```

*(Floating-point precision effect)*

---

## 6. Rank of Matrix A

```python
rank_A = np.linalg.matrix_rank(A)
print("\nRank of A:", rank_A)
```

* Rank = number of linearly independent rows/columns.
* Since determinant ≠ 0, matrix A is full rank.

### Output

```
Rank of A: 2
```

---

## 7. Eigenvalues of Matrix A

```python
eg_values, eg_vectors = np.linalg.eig(A)
print("\nEigenvalues: ", eg_values)
```

### Eigenvalues

$$
\lambda_1 = 4, \quad \lambda_2 = 1
$$


### Output

```
Eigenvalues:  [4. 1.]
```

---

## 8. Inverse of Matrix A

```python
if np.linalg.det(A) != 0:
    inv_A = np.linalg.inv(A)
else:
    inv_A = "Matrix is Singular, cannot compute"

print("\nInverse of A:\n", inv_A)
```

* Inverse exists because determinant ≠ 0.

### Inverse of A

$$
A^{-1} = \begin{bmatrix}
0.5 & -0.25 \\
-0.5 & 0.75
\end{bmatrix}
$$


### Output

```
Inverse of A:
 [[ 0.5  -0.25]
  [-0.5   0.75]]
```

---

## 9. Creating Matrix B (With One Value Changed)

```python
B = A
B[0][1] = B[0][1] + 1
print(B)
```


### Changed Element

* Position `(0,1)` (1st row, 2nd column)
* Value changed from `1 → 2`

### Matrix B

$$
B = \begin{bmatrix}
3 & 2 \\
2 & 2
\end{bmatrix}
$$


### Output

```
[[3 2]
 [2 2]]
```

---

## 10. Shape (Size) of Matrix B

```python
size_B = B.shape
print("\nSize of B: ", size_B)
```

### Output

```
Size of B:  (2, 2)
```

---

## 11. Determinant of Matrix B

```python
det_B = np.linalg.det(B)
print("\nDeterminant of B: ", det_B)
```

### Calculation

$$
\det(B) = (3 \times 2) - (2 \times 2) = 6 - 4 = 2
$$


### Output

```
Determinant of B:  2.0000000000000004
```

---

## 12. Rank of Matrix B

```python
rank_B = np.linalg.matrix_rank(B)
print("\nRank of B:", rank_B)
```

* Determinant ≠ 0 → full rank.

### Output

```
Rank of B: 2
```

---

## 13. Eigenvalues of Matrix B

```python
eg_values, eg_vectors = np.linalg.eig(B)
print("\nEigenvalues: ", eg_values)
```

### Eigenvalues (Approximate)

$$
\lambda_1 \approx 4.5616, \quad \lambda_2 \approx 0.4384
$$


### Output

```
Eigenvalues:  [4.56155281 0.43844719]
```

---

## 14. Inverse of Matrix B

```python
if np.linalg.det(B) != 0:
    inv_B = np.linalg.inv(B)
else:
    inv_B = "Matrix is Singular, cannot compute"

print("\nInverse of B:\n", inv_B)
```

### Inverse of B

$$
B^{-1} = \begin{bmatrix} 1 & -1 \\
 -1 & 1.5 \end{bmatrix}
$$


### Output

```
Inverse of B:
 [[ 1.  -1. ]
  [-1.   1.5]]
```

---

<br>
<br>

## 5. Comparison & Explanation

1. How did the determinant change and why?
    
    → Determinant of A = 4

    → Determinant of B = 2

    → The determinant decreased from 4 to 2

The determinant of a 2×2 matrix: 
det = ad−bc

By increasing the value of B[0][1], the subtraction term (bc) increased, which reduced the overall determinant

---

2. Did the rank change? Explain.

    → Rank of A = 2

    → Rank of B = 2

    the rank did not change

Changing one element was not enough to make rows dependent, so the matrix kept full rank

---

3. How did the eigenvalues respond to the value change?

    → Eigenvalues:  [4. 1.]

    → Eigenvalues:  [4.56155281 0.43844719]

    Eigenvalues depend on all elements of a matrix

---

4. Is B easier or harder to invert than A? Why?

    → Determinant of A = 4

    → Determinant of B = 2

A smaller determinant means:

   ▹ The matrix is closer to singular

   ▹ Inverse calculations are more sensitive to numerical error

thats why B is slightly less stable to invert