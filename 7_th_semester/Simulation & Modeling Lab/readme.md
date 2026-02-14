

# Pages
- [Page 1](docs/page1.md) -> [**1. Scalar & Array Operations**](docs/page1.md)
- [Page 2](docs/page2.md)  -> [**2. Unique Matrix Value Investigation**](docs/page2.md)
- [Page 3](docs/page3.md)  -> [**3. Matrix Operations and Visualization**](docs/page3.md)


## 1️⃣ NumPy

```python
import numpy as np
```

### 🔹 What it’s for

**Fast numerical computation** and **arrays**

### 🔹 Main uses

* Working with **arrays & matrices**
* Mathematical operations (mean, sum, dot product, etc.)
* Linear algebra
* Random number generation

### 🔹 Example

```python
a = np.array([1, 2, 3])
b = np.array([4, 5, 6])
print(a + b)
```
---

## 2️⃣ SymPy

```python
from sympy import Matrix
```

### 🔹 What it’s for

**Symbolic mathematics** (exact math, not approximations)

### 🔹 Main uses

* Algebraic expressions
* Solving equations symbolically
* Calculus (derivatives, integrals)
* Exact matrices (with symbols)

### 🔹 Example

```python
from sympy import symbols, solve

x = symbols('x')
solve(x**2 - 4, x)
```
---

## 3️⃣ Matplotlib

```python
import matplotlib.pyplot as plt
```

### 🔹 What it’s for

**Data visualization (plots & graphs)**

### 🔹 Main uses

* Line plots
* Bar charts
* Scatter plots
* Histograms
* Custom plots (very flexible)

### 🔹 Example

```python
x = [1, 2, 3, 4]
y = [10, 20, 25, 30]

plt.plot(x, y)
plt.show()
```

👉 Matplotlib is **powerful but low-level** — you control almost everything.

---

## 4️⃣ Seaborn

```python
import seaborn as sns
```

### 🔹 What it’s for

**Statistical data visualization (pretty plots)**

### 🔹 Main uses

* Beautiful plots with **less code**
* Statistical plots (boxplot, violin plot, heatmap)
* Works great with Pandas DataFrames

### 🔹 Example

```python
sns.histplot([1, 2, 2, 3, 3, 3, 4])
plt.show()
```

---
<br>
<br>
<br>

# Pages
- [Page 1](docs/page1.md) -> [**1. Scalar & Array Operations**](docs/page1.md)
- [Page 2](docs/page2.md)  -> [**2. Unique Matrix Value Investigation**](docs/page2.md)
- [Page 3](docs/page3.md)  -> [**3. Matrix Operations and Visualization**](docs/page3.md)
